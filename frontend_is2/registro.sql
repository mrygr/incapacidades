CREATE TABLE registro (
    nombre VARCHAR(50) NOT NULL,
    cedula INT(11) PRIMARY KEY,
    email VARCHAR(100) UNIQUE NOT NULL,
    contraseña VARCHAR(100) NOT NULL
);
