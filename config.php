<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "alumni_feedback";


$con = new mysqli($servername, $username, $password);


if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}


$result = $con->query("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$dbname'");

if ($result->num_rows == 0) {

    $sql_create_db = "CREATE DATABASE $dbname";
    if ($con->query($sql_create_db) === TRUE) {
   
        
       
        $con->close();
        $con = new mysqli($servername, $username, $password, $dbname);
        echo "database created";

//PSOS
$tableName="program";
$checkTableQuery = "SHOW TABLES LIKE '$tableName'";
$tableExists = $con->query($checkTableQuery)->num_rows > 0;

if (!$tableExists) {$SQL="CREATE TABLE $tableName(
      department varchar(10),
      question1 varchar(500),
      question2 varchar(500),
      question3 varchar(1000),
      question4 varchar(1000),
      question5 varchar(1000)
    )";

if ($con->query($SQL) === TRUE) {

} else {
  echo "Error creating table: " . $con->error;
}

$sql_insert_values = "INSERT INTO $tableName (department, question1,question2,question3,question4,question5)
VALUES ('ce','Field applications oriented practical knowledge in Civil Engineering such as Planning, Analysis, Designing, Estimation and Execution by applying current concepts of mathematics and physical sciences', 'An ability to succeed competitive examinations which offers challenging and rewarding career and to become an efficient Design engineer, Structural consultant, Project engineer or Construction manager with the help of management skills and leadership characteristics',' Graduates will formulate and solve problems in various domains of Civil Engineering by exhibiting their technical skills.',' Graduates will communicate effectively and work in multidisciplinary engineering projects following the ethics in their profession.','Graduates will become entrepreneurs or successfully pursue higher education for their professional development.'),
 ('ec', 'Good knowledge and hands-on competence to solve emerging real-world problems related to Electronic Devices and Circuits, Communication Systems, Digital Systems, and Electro-magnetics.',' Demonstrate proficiency in specialized software packages and computer programming useful for the analysis/design of electronic engineering systems and profession.','Graduates will be able to comprehend Mathematics, Science, Engineering fundamentals, laboratory and work based experience to formulate and solve problems related to the domain and shall develop proficiency in computer based engineering and the use of computational tools.','Graduates will be prepared to communicate and work team­based on the multidisciplinary projects practicing the ethics of their profession with a great sense of social responsibility.','Graduates will recognize the importance of lifelong learning to shine as experts either as entrepreneurs or as employees and thereby broadening their professional knowledge.'),
 ('ee','Apply the knowledge in the field of electrical and electronics engineering to analyse, design and develop solutions for real world problems.','Demonstrate the skill in core and allied domain to work in interdisciplinary teams.','Graduates will synthesize mathematics, science, engineering fundamentals, laboratory and work-based experiences to formulate and solve problems in Electrical and Electronics engineering and the related domains and will develop proficiency in Computer-based engineering and the use of computational tools.',' Graduates will communicate and work team-based on the multidisciplinary engineering projects in the allied fields of Electrical Science and will practice the ethics of their profession.','Graduates will realize the importance of self-learning and engage in lifelong learning to become experts either as an entrepreneur or an employee so as to broaden their knowledge in the domain.'),
 ('me',' Identify analyse and impart complex engineering problems in Thermal Engineering, Design Engineering and Manufacturing Engineering domains.','Enabling the student to take-up career in core industries so as to develop products using CAD/CAM tools.',' Graduates will formulate and solve problems in the mechanical engineering domain and will develop proficiency in computer based engineering and use of computational tools.',' Graduates will communicate and engage in team-based work on multidisciplinary engineering projects practicing the ethics in their profession.','Graduates will recognize the importance of self-learning and engage in continuous independent learning to become successful entrepreneurs or professionals in their domain.'),
 ('et','Comprehend and analyze specific engineering problems in the field of Electronics & Telecommunication Engineering by applying the concepts of science, mathematics and engineering basics with Competency in using electronic Design Automation tools (both software and hardware) for the analysis and design of advanced electronic systems which culminates to link academics with research.','Apply the contextual knowledge of Electronics and Telecommunication Engineering to find solution to real time problems as an individual or a leader in a team to manage software projects pertaining to interdisciplinary environments to enhance life-long learning.','Graduates will be able to synthesize mathematics, science, engineering fundamentals; laboratory and work-based experiences to formulate and solve problems related to the domain and shall develop proficiency in computer-based engineering and the use of computational tools.',' Graduates will engage in Lifelong learning so that they can get adapted in a world of frequently changing technology.','Graduates will be prepared to communicate and work effectively on team-based multidisciplinary engineering projects and will practice the ethics of their profession consistent with a sense of social responsibility.'),
 ('cy',' Analyze, Design, Implement, Development and production in practices of computer science and engineering application pivot to Cryptography, Cyber Security and Cyber Forensics.','Ability to adapt for rapid growth in tools and technology with an understanding and solving the complex issues in vulnerability, risk assessment, physical and technical safe guards relevant to professional engineering.','Graduates will be able to comprehend mathematics, science, engineering fundamentals, laboratory and work-based experiences to formulate and solve problems related to the domain of Cyber Security, Cyber Forensics and develop proficiency in computer based engineering and the use of computation tools.','Graduates will be prepared to communicate and work effectively on the multidisciplinary engineering projects practicing the ethics of their profession with a sense of social responsibility.','Graduates will recognize the importance of lifelong learning to become experts both as entrepreneurs or employees and to extend their knowledge in their domain.'),
 ('cs','Analyze, design, implement, test and evaluate computer programs in the areas related to algorithms, networking, web design, cloud computing, IoT and data analytics of varying complexity.','Develop innovative ideas to provide solutions for complex problems and apply advanced knowledge of computer science domain to identify research challenges in Computer Science and Engineering.','Graduates will be able to comprehend mathematics, science, engineering fundamentals, laboratory and work-based experiences to formulate and solve problems in Computer Science and Engineering and other related domains and will develop proficiency in computer based engineering and the use of computation tools.','Graduates will be prepared to communicate and work effectively on the multidisciplinary engineering projects practicing the ethics of their profession with a sense of social responsibility.','Graduates will recognize the importance of lifelong learning to become experts either as entrepreneurs or employees and to widen their knowledge in their domain.'),
 ('ct',' Analyze, design, implement, test and evaluate computer programs in the areas related to networking, Storage Systems, web design, cloud computing, IoT and data capturing analysis of varying complexity.','Develop innovative ideas to provide solutions for complex technological problems and apply advanced knowledge of computer technology domain to identify research challenges in Computer Science and Technology.',' Graduates will be able to comprehend mathematics, science, engineering fundamentals, laboratory and work-based experiences to formulate and solve problems in Computer Science and Technology and other related domains and will develop proficiency in computer based technologies and the use of computation techniques.','Graduates will be prepared to communicate and work effectively on the multidisciplinary engineering and technology projects practicing the ethics of their profession with a sense of social responsibility.','Graduates will recognize the importance of lifelong learning to become experts either as entrepreneurs or employees and to widen their knowledge in their domain.'),
 ('it','Ability to organize an IT infrastructure, secure the data and analyze the data analytic techniques in the field of data mining, big data as to facilitate in solving problems.','Ability to analyze and design the system in the domain of Cloud and Internet of Things.',' Graduates will be able to comprehend mathematics, science, engineering fundamentals, laboratory and work-based experiences to formulate and solve problems in the domain of Information Technology and acquire proficiency in Computer-based engineering and the use of computational tools.',' Graduates will be prepared to communicate and work effectively on multidisciplinary engineering projects and practicing the ethics of their profession.',' Graduates will realize the importance of self-learning and engage in lifelong learning to become experts either as entrepreneurs or employees in the field to widen the professional knowledge.'),
 ('ad',' Demonstrate the knowledge of Artificial Intelligence, Machine Learning and Data Science for designing and developing intelligent systems','Implement Artificial Intelligence and data science methods for solving a problem in multi-disciplinary areas and design novel algorithms.',' Graduates will be able to demonstrate technical skills, competency in Artificial Intelligence and Data Science, exhibit proficiency and team management capability with proper communication in the job environment.','Graduates will be able to work effectively in multidisciplinary engineering projects and support the growth of the economy of a nation by becoming entrepreneurs with a lifelong learning practice.',' Graduates will be able to carry out the research in the contemporary areas of Artificial Intelligence, Data Science and address the basic needs of the society.'),
 ('cd',' Analyze, design, implement, test and evaluate computer programs in the areas related to networking, Storage Systems, web design, cloud computing, IoT and data capturing analysis of varying complexity.','Develop innovative ideas to provide solutions for complex technological problems and apply advanced knowledge of computer technology domain to identify research challenges in Computer Science and Design.','Graduates will be prepared to the practice and grow as computing and design professionals, conducting research undertaking professional leadership entrepreneur graphics and game designing developing maintaining projects in various technical areas of computer science and design','Graduates will be nurtured to use and apply computer science and design principles through lifelong learning creatively and responsibly with a high degree of professionalism and with a clear understanding of ethical and legal issues and produce tangible contributions in their profession','Graduates will be trained to communicate and work effectively on the multidisciplinary engineering projects related to computer science and design with strong professional and work ethics for the betterment of the society.')
";


if ($con->query($sql_insert_values) === TRUE) {
     echo "created successfully";
} else {
  echo "Error inserting values: " . $con->error;
}
}

//Alumni Questionnaire

$tableName="alumni_questionnaire";
$checkTableQuery = "SHOW TABLES LIKE '$tableName'";
$tableExists = $con->query($checkTableQuery)->num_rows > 0;




if (!$tableExists) {$SQL="CREATE TABLE $tableName(
    s integer,
    question varchar(500)
  )";

if ($con->query($SQL) === TRUE) {

} else {
echo "Error creating table: " . $con->error;
}

$sql_insert = "INSERT INTO $tableName(s,question) VALUES
(1,'Apply the knowledge of mathematics, science, engineering fundamentals, and an engineering specialization to the solution of complex engineering problems'),
(2,'Identify, formulate, review research literature, and analyze complex engineering problems reaching substantiated conclusions using first principles of mathematics, natural sciences, and engineering sciences'),
(3,'Design solutions for complex engineering problems and design system components or processes that meet the specified needs with appropriate consideration for the public health and safety, and the cultural, societal, and environmental considerations.'),
(4,'Use research-based knowledge and research methods including design of experiments, analysis and interpretation of data, and synthesis of the information to provide valid conclusions.'),
(5,'Create, select, and apply appropriate techniques, resources, and modern engineering and IT tools including prediction and modeling to complex engineering activities with an understanding of the limitations.'),
(6,'Apply reasoning informed by the contextual knowledge to assess societal, health, safety, legal and cultural issues and the consequent responsibilities relevant to the professional engineering practice.'),
(7,'Understand the impact of the professional engineering solutions in societal and environmental contexts, and demonstrate the knowledge of, and need for sustainable development.'),
(8,'Apply ethical principles and commit to professional ethics and responsibilities and norms of the engineering practice'),
(9,'Function effectively as an individual, and as a member or leader in diverse teams, and in multidisciplinary settings'),
(10,'Communicate effectively on complex engineering activities with the engineering community and with society at large, such as, being able to comprehend and write effective reports and design documentation, make effective presentations, and give and receive clear instructions'),
(11,'Demonstrate knowledge and understanding of the engineering and management principles and apply these to one’s own work, as a member and leader in a team, to manage projects and in multidisciplinary environments'),
(12,'Recognize the need for, and have the preparation and ability to engage in independent and life-long learning in the broadest context of technological change'),
(13,''),
(14,''),
(15,'Please list the courses you learned in your UG/PG course which you find highly useful in industry'),
(16,'What are the Value added courses you studied while at KCE, you feel is useful in your profession?'),
(17,'What type of training do you think should be given in college, so that it might be useful in your position?'),
(18,'What improvements you would recommend for the college?'),
(19,'Have you published any papers in a conference or journal after graduation?'),
(20,'Have you filed for any patent?'),
(21,'With the sufficient knowledge you gained while graduating were you able to take any problems that arise connected with your field of work?'),
(22,'Are you successful in taking up multidisciplinary projects and work as a team with full awareness of your responsibility to the society?'),
(23,'Are you in the habit of attending conferences, publishing papers or did you go for any higher studies after graduating from here?')
";
if ($con->query($sql_insert) === TRUE) {
    echo "created successfully";
} else {
 echo "Error inserting values: " . $con->error;
}

}

  }}  
    else{
      //  echo "already created";
    }   
    $con = new mysqli($servername, $username, $password, $dbname);
?>