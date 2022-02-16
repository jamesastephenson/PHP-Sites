--using the CAST function to perform data type conversion
--remember that the types need to be compatible (ie. letter cannot become number)

SELECT timestamp_column, CAST(timestamp_column AS varchar(10)) 
FROM date_time_types;

SELECT numeric_column, 
	CAST(numeric_column AS integer), 
	CAST(numeric_column AS text) 
FROM number_data_types;

--commented out, will net an error
--SELECT CAST(char_column AS integer) FROM char_data_types;