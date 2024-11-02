CREATE TABLE CarCompany (
    company_id INT PRIMARY KEY AUTO_INCREMENT,
    company_name VARCHAR(100) NOT NULL,
    country VARCHAR(50),
    founded_year INT
);

CREATE TABLE CarModel (
    model_id INT PRIMARY KEY AUTO_INCREMENT,
    model_name VARCHAR(100) NOT NULL,
    year INT,
    price DECIMAL(10, 2),
    company_id INT,
    FOREIGN KEY (company_id) REFERENCES CarCompany(company_id)
        ON DELETE CASCADE
);

-- To reset the table uncomment the following:
-- -- Step 1: Drop the foreign key constraint
-- ALTER TABLE carmodel DROP FOREIGN KEY carmodel_ibfk_1;

-- -- Step 2: Truncate the tables
-- TRUNCATE TABLE carmodel;
-- TRUNCATE TABLE carcompany;

-- -- Step 3: Reset AUTO_INCREMENT
-- ALTER TABLE carmodel AUTO_INCREMENT = 1;
-- ALTER TABLE carcompany AUTO_INCREMENT = 1;

-- -- Step 4: Re-add the foreign key constraint
-- ALTER TABLE carmodel
-- ADD CONSTRAINT carmodel_ibfk_1
-- FOREIGN KEY (company_id) REFERENCES carcompany(company_id);


-- To remove foreign key for delete function uncomment the following:
-- ALTER TABLE carmodel
-- DROP FOREIGN KEY carmodel_ibfk_1;

-- ALTER TABLE carmodel
-- ADD CONSTRAINT carmodel_ibfk_1
-- FOREIGN KEY (company_id) REFERENCES carcompany(company_id)
-- ON DELETE CASCADE;
