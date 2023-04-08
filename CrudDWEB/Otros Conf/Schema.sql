Create DataBase AppB_DWEB;

use Appb_DWEB;

CREATE TABLE estudiante (
  id_e INT PRIMARY KEY AUTO_INCREMENT,
  nombreE VARCHAR(50) NOT NULL,
  fecha_nacimiento DATE NOT NULL,
  direccion VARCHAR(100),
  correo_electronico VARCHAR(100) NOT NULL,
  imagen longtext NOT NULL
);

CREATE TABLE materia (
  id_m INT PRIMARY KEY AUTO_INCREMENT,
  nombreM VARCHAR(50) NOT NULL,
  descripcion VARCHAR(200),
  creditos INT NOT NULL
);

CREATE TABLE nota (
  id INT PRIMARY KEY AUTO_INCREMENT,
  estudiante_id INT NOT NULL,
  materia_id INT NOT NULL,
  calificacion FLOAT NOT NULL,
  FOREIGN KEY (estudiante_id) REFERENCES estudiante(id_e),
  FOREIGN KEY (materia_id) REFERENCES materia(id_m)
);

SELECT * FROM nota
INNER JOIN estudiante ON nota.estudiante_id = estudiante.id
INNER JOIN materia ON nota.materia_id = materia.id
WHERE nota.id = 1;

SELECT * FROM nota;

DROP TABLE nota;

DROP DATABASE AppB_DWEB;