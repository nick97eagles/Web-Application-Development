DELETE FROM student;
INSERT INTO student (student_id,student_first,student_last,student_level,student_bdate) VALUES
  (101,'Sally','Smith',2,'1997-03-02'),
  (102,'Bill','Bronson',1,'1996-01-05'),
  (103,'David','Drake',1,'1998-11-12'),
  (104,'Jane','Jones',1,'1997-08-08'),
  (105,'Edward','Evans',2,'1996-02-10'),
  (106,'Thomas','Taylor',1,'1998-09-14'),
  (107,'Laura','Lee',1,'1997-04-21'),
  (108,'Charles','Cramer',2,'1997-07-13'),
  (109,'Fred','Friedrickson',2,'1997-05-29'),
  (110,'Gwen','Gustav',1,'1996-12-07');
  
DELETE FROM department;
INSERT INTO department (department_id,department_name) VALUES
  (1,'Mathematics'),
  (2,'Computer Science'),
  (3,'Engineering');
  
DELETE FROM majors;
INSERT INTO majors (student_id,department_id) VALUES
  (101,1),(101,2),(102,3),(103,2),(104,2),(105,1),(106,3),(107,1),(107,3),(108,2),(109,1),(110,2);
  
DELETE FROM course;
INSERT INTO course (course_id,department_id,course_prefix,course_num,course_name) VALUES
  (1,1,'MATH','181','Calculus I'),
  (2,1,'MATH','250','Discrete Mathematics'),
  (3,2,'CPTR','141','Fundamentals of Programming I'),
  (4,2,'CPTR','220','Web Application Development'),
  (5,2,'CPTR','320','Web Services and Cloud Computing'),
  (6,3,'ENGR','121','Intro to Engineering'),
  (7,2,'CPTR','142','Fundamentals of Programming II');
  
DELETE FROM term;
INSERT INTO term (term_id,term_name) VALUES 
  (1,'Autumn 2016'),(2,'Winter 2017');

DELETE FROM offering;
INSERT INTO offering (offering_id,course_id,term_id,offering_section,offering_instructor,offering_time) VALUES
  (1,1,1,'A','Foster','9:00am MTWF'),
  (2,1,1,'B','Magi','1:00pm MTWF'),
  (3,1,2,'','Tiffin','8:00am MTWF'),
  (4,2,2,'','Tiffin','1:00pm MTWF'),
  (5,3,1,'A','Alexander','8:00am MWRF'),
  (6,3,1,'B','Alexander','11:00am MWRF'),
  (7,3,2,'','Carman','10:00am MWRF'),
  (8,4,1,'','Carman','Arranged'),
  (9,5,2,'','Carman','1:00pm MTRF'),
  (10,6,1,'A','Selby','12:00pm TR'),
  (11,6,1,'B','Riley','1:00pm TR'),
  (12,7,2,'A','Alexander','11:00am MWRF'),
  (13,7,2,'B','Alexander','1:00pm MWRF');
  
DELETE FROM takes;
INSERT INTO takes (student_id,offering_id,takes_grade) VALUES
  (101,1,''),(101,4,''),(101,8,''),(101,9,''),
  (102,2,''),(102,10,''),(102,7,''),
  (103,2,''),(103,4,''),(103,5,''),(103,13,''),
  (104,5,''),(104,12,''),(104,3,''),
  (105,6,''),(105,4,''),
  (106,2,''),(106,11,''),(106,7,''),
  (107,2,''),(107,10,''),(107,4,''),
  (108,8,''),(108,9,''),
  (109,1,''),(109,7,''),
  (110,5,''),(110,12,''),(110,3,'');
  
