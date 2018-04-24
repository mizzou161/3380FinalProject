DROP TABLE if EXISTS Students;
DROP TABLE IF EXISTS Courses;
DROP TABLE IF EXISTS Instructors;

CREATE TABLE  `epiz_21504611_EngineeringSchoolDB`.`Students` (
`id` INT NOT NULL AUTO_INCREMENT ,
`Name` CHAR( 50 ) NOT NULL ,
`Major` ENUM(  'CS',  'IT',  'MECH',  'CHEM',  'PET',  'CVL' ) NOT NULL DEFAULT  'CS',
`position` ENUM(  'Undergraduate',  'Graduate' ) NOT NULL DEFAULT  'Undergraduate',
`Standing` ENUM(  'Freshmen',  'Sophomore',  'Junior',  'Senior' ) NOT NULL DEFAULT 'Freshmen',
`GPA` FLOAT( 3, 2 ) NULL ,
`Pawprint` CHAR( 10 ) NOT NULL ,
PRIMARY KEY (  `id` )
) ENGINE = MYISAM ;	

CREATE TABLE  `epiz_21504611_EngineeringSchoolDB`.`Courses` (
`id` INT NOT NULL AUTO_INCREMENT ,
`studentID` INT( 11 ) NOT NULL ,
`Name` CHAR( 30 ) NOT NULL ,
`Department` ENUM(  'CS',  'IT',  'MECH',  'CHEM',  'PET',  'CVL' ) NOT NULL DEFAULT  'CS',
`cNumber` INT( 4 ) NULL ,
`Instructor` CHAR( 52 ) NOT NULL ,
`Location` ENUM(  'On-Campus',  'Online' ) NOT NULL DEFAULT  'On-Campus',
`Semester` ENUM(  'Fall',  'Spring',  'Summer' ) NOT NULL DEFAULT  'Fall',
`taken` INT( 4 ) NULL ,
PRIMARY KEY (  `id` )
) ENGINE = MYISAM ;

CREATE TABLE  `epiz_21504611_EngineeringSchoolDB`.`Instructors` (
`id` INT NOT NULL AUTO_INCREMENT ,
`Name` CHAR( 52 ) NOT NULL ,
`cNumber` INT( 4 ) NOT NULL ,
`cName` CHAR( 30 ) NOT NULL ,
`Department` ENUM(  'CS',  'IT',  'MECH',  'CHEM',  'PET',  'CVL' ) NOT NULL DEFAULT  'CS',
PRIMARY KEY (  `id` )
) ENGINE = MYISAM ;


	
	