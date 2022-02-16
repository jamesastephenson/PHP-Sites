--rounding issues with float columns
--remember that due to how computers run math, you may encounter rounding errors
SELECT 
	numeric_column * 10000000 AS fixed, 
	real_column * 10000000 AS floating 
FROM number_data_types 
WHERE numeric_column = .7;