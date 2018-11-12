-- Populate projectUser

INSERT INTO projectUser(projectId, userId)
SELECT  p.id, u.id
FROM    project p JOIN user u;