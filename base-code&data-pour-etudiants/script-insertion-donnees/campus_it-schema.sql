-- Création de la base de données campus_it
CREATE DATABASE IF NOT EXISTS campus_it 
    CHARACTER SET utf8 
    COLLATE utf8_general_ci;

USE campus_it;

-- Table des applications du campus
CREATE TABLE application (
    app_id INT PRIMARY KEY,
    nom VARCHAR(80) NOT NULL
);

-- Table des types de ressources informatiques
CREATE TABLE ressource (
    res_id INT PRIMARY KEY,
    nom VARCHAR(30) NOT NULL,
    unite VARCHAR(10) NOT NULL
);

-- Table des consommations mensuelles (lie une appli à une ressource)
CREATE TABLE consommation (
    conso_id INT PRIMARY KEY AUTO_INCREMENT,
    app_id INT NOT NULL,
    res_id INT NOT NULL,
    mois DATE NOT NULL,
    volume DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (app_id) REFERENCES application(app_id),
    FOREIGN KEY (res_id) REFERENCES ressource(res_id),
    INDEX (mois),
    INDEX (app_id),
    INDEX (volume)
);
