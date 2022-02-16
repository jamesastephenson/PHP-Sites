-- Character data types in action
CREATE TABLE char_data_types (
	char_column char(10), 
	varchar_column varchar(10), 
	text_column text
);

INSERT INTO char_data_types 
VALUES 
	('abc', 'abc', 'abc'),
	('defghi', 'defghi', 'defghi');

--PostgreSQL COPY keyword used ot export to a file
--COPY char_data_types TO 'C:\YourDirectory\typetext.txt' 
--WITH (FORMAT CSV, HEADER, DELIMITER '|');