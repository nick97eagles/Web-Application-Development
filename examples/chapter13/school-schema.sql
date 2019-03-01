CREATE TABLE IF NOT EXISTS student (
  student_id INT NOT NULL,
  student_first VARCHAR(100),
  student_last VARCHAR(100),
  student_level TINYINT NOT NULL,
  student_bdate DATETIME NOT NULL,
  CONSTRAINT PRIMARY KEY(student_id)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS department (
  department_id INT NOT NULL,
  department_name VARCHAR(100),
  CONSTRAINT PRIMARY KEY(department_id)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS majors (
  student_id INT NOT NULL,
  department_id INT NOT NULL,
  CONSTRAINT PRIMARY KEY(student_id,department_id),
  CONSTRAINT FOREIGN KEY(student_id) REFERENCES student(student_id),
  CONSTRAINT FOREIGN KEY(department_id) REFERENCES department(department_id)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS course (
  course_id INT NOT NULL,
  department_id INT NOT NULL,
  course_prefix VARCHAR(4),
  course_num TINYINT,
  course_name VARCHAR(100),
  CONSTRAINT PRIMARY KEY(course_id),
  CONSTRAINT FOREIGN KEY(department_id) REFERENCES department(department_id)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS term (
  term_id INT NOT NULL,
  term_name VARCHAR(100),
  CONSTRAINT PRIMARY KEY(term_id),
  CONSTRAINT UNIQUE(term_name)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS offering (
  offering_id INT NOT NULL,
  course_id INT NOT NULL,
  term_id INT NOT NULL,
  offering_section VARCHAR(5),
  offering_instructor VARCHAR(100),
  offering_time VARCHAR(100),
  CONSTRAINT PRIMARY KEY(offering_id),
  CONSTRAINT FOREIGN KEY(course_id) REFERENCES course(course_id),
  CONSTRAINT FOREIGN KEY(term_id) REFERENCES term(term_id)
) ENGINE=InnoDB;
  
CREATE TABLE IF NOT EXISTS takes (
  student_id   int not null,
  offering_id  int not null,
  takes_grade  VARCHAR(5),
  CONSTRAINT PRIMARY KEY(student_id,offering_id),
  CONSTRAINT FOREIGN KEY(student_id) REFERENCES student(student_id),
  CONSTRAINT FOREIGN KEY(offering_id) REFERENCES offering(offering_id)
) ENGINE=InnoDB;
