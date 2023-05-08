#!/bin/bash


#Sobreescribimos a los dos archivos
echo "" > /var/www/vhost2/sDWEB_rx.txt
echo "" > /var/www/vhost2/sDWEB_tx.txt

x=0

while true; do
	t=$(date +%H:%M:%S)
	
	#Obtenemos los bytes recibidos y transferidos
	rx_bytes=$(cat /sys/class/net/enp0s3/statistics/rx_bytes)
	tx_bytes=$(cat /sys/class/net/enp0s3/statistics/tx_bytes)
	
	#Convert to kB
	rx_bytes=$(echo "scale=2; $rx_bytes/1024" | bc)
	tx_bytes=$(echo "scale=2; $tx_bytes/1024" | bc)

	#Imprimimos
	echo "$t-$tx_bytes"
	echo "$t-$rx_bytes"	

	#Exportamos a dos archivos
	echo "$t-$rx_bytes" >> /var/www/vhost2/sDWEB_rx.txt
	echo "$t-$tx_bytes" >> /var/www/vhost2/sDWEB_tx.txt
	
	sleep 1
	x=$((x+1))
	
	if ((x % 10 == 0)); then
		#Tomamos las ultimas 20 de cada archivo
		rx_bytes=$(tail -n 10 sDWEB_rx.txt)	
		tx_bytes=$(tail -n 10 sDWEB_tx.txt)

		#Sobreescribimos a los dos archivos
		echo "$rx_bytes" > /var/www/vhost2/sDWEB_rx.txt
		echo "$tx_bytes" > /var/www/vhost2/sDWEB_tx.txt

		echo "///////////////////////////////////////"		
	fi
done
