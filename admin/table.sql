CREATE TABLE `users`(
s_no INT(11) AUTO_INCREMENT PRIMARY KEY,
name VarChar(70) Null,
contact VARCHAR(15) null,
password text null,
user_type VARCHAR(10) null);

CREATE TABLE `elections`(
s_no INT(11) AUTO_INCREMENT,
election_topic VarChar(100) Null,
no_of_canidates INT(4) null,
starting_date DATE null,
ending_date DATE null,
status VARCHAR(20) NULL,
user_no INT(11),
inserted_on DATE,
PRIMARY KEY(s_no,user_no),
FOREIGN KEY(user_no) REFERENCES users(s_no));


CREATE TABLE `candidates`(
s_no INT(11) AUTO_INCREMENT,
CandidateName VarChar(100) Null,
CandidateDetails TEXT null,
CandidatePhoto TEXT null,
ElectionId INT(11) null,
userId INT(11) NULL,
inserted_on DATE,
PRIMARY KEY(s_no,ElectionId),
FOREIGN KEY(userId) REFERENCES users(s_no),
FOREIGN KEY(ElectionId) REFERENCES elections(s_no));

Create TABLE votes(
voteId INT(11) AUTO_INCREMENT,
electionId INT(11),
candidateId INT(11),
voterId INT(11),
PRIMARY KEY (voteId,electionId,candidateId,voterId),
FOREIGN KEY(voterId) REFERENCES users(s_no),
FOREIGN KEY(candidateId) REFERENCES candidates(s_no),
FOREIGN KEY(electionId) REFERENCES elections(s_no)
);