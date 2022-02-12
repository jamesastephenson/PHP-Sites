-- a SELECT statement including WHERE and ORDER BY 
SELECT first_name, last_name, school, hire_data, salary 
FROM teachers 
WHERE school LIKE '%Roos%';
ORDER BY hire_date DESC;