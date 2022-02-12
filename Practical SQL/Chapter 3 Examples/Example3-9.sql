--combine operators with AND and OR

--AND
SELECT * 
FROM teachers 
WHERE school = 'Myers Middle School'
	AND salary < 40000;

--OR
SELECT * 
FROM teachers 
WHERE last_name = 'Cole' 
	OR last_name = 'Bush';

--multiple operators with parentheses for added logic
SELECT * 
FROM teachers 
WHERE school = 'F.D. Roosevelt HS' 
	AND (salary < 38000 OR salary > 40000);