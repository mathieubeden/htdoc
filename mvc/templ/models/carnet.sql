CREATE TABLE CARNET (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    NOM VARCHAR(30),
    PRENOM VARCHAR(30),
    NAISSANCE DATE,
    VILLE VARCHAR(30)
    );

INSERT INTO CARNET VALUES (null,'SMITH','JOHN','1980-12-17','ORLEANS');
INSERT INTO CARNET VALUES (null,'DURAND','JEAN','1983-1-13','ORLEANS');
INSERT INTO CARNET VALUES (null,'GUDULE','JEANNE','1967-11-6','TOURS');
INSERT INTO CARNET VALUES (null,'ZAPATA','EMILIO','1956-12-1','ORLEANS');
INSERT INTO CARNET VALUES (null,'JOURDAIN','NICOLAS','2000-09-10','TOURS');
INSERT INTO CARNET VALUES (null,'DUPUY','MARIE','1986-1-11','BLOIS');
INSERT INTO CARNET VALUES (null,'ANDREA','LOU','1900-1-1','BLOIS');


COMMIT;
