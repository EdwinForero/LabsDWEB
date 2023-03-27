#!/usr/bin/env python3

import smtplib
import datetime
import os
import cgi, cgitb
from email.message import EmailMessage

#System date
now = datetime.datetime.now()
date_string = now.strftime("%Y-%m-%d %H:%M:%S")

#Users
sender = "edwinmenfor2000@gmail.com"
password = "qayzjnidnubyjchv"
receiver = "edwin-forero@upc.edu.co"

#Content
subject = "DWEB email"
body = "Test desde python con apache2. \n" + date_string
print(body) 

#Create a message
message = EmailMessage()
message['Subject'] = subject
message['from'] = sender
message['To'] = receiver
message.set_content(body)

#Init server and send message
domain = "smtp.gmail.com"
server = smtplib.SMTP(domain, '587')
server.ehlo()
server.starttls()
server.login(sender, password)
server.send_message(message)

server.quit()

#Pritn WEB
print("Content-type:text/html \n")
print("<html>")
print("<head>")
print("<title>Email sent</title>")
print("</head>")
print("<body>")
print("<h2>Correo enviado con exito</h2>")
print("</body>")
print("</html>")
