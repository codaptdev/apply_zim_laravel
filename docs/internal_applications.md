The idea is pretty simple but not so simple to implement here is how its done

- its made up of two important entities

# 1. Application Question

Represents the an individual question made by the school that the applicant should answer. This question to avoid repeating groups (1NF). It has the following fields

- School ID (A reference of the school that has made the question)
- The label / title of the question
- Placeholder text
- Response Type (The data type that the response by the applicant is supposed to be in .e.g. INTEGER, IMAGE. These types are classes already so yeah!)

# 2. Application Response

An entity representing the answer to a application question made by a student. It has the following fields

- Student ID (a reference to the student that made the response)
- Response (can be a link to a file or a text response depending on the type of the application question)
- Question ID (the id of the question that the response is for)

# 3. The Application

An entity that represents an application sent forward by a student. This entity already exists on the platform so one more field will have to be added 

- on site/ internal application flag (signifies if an application was made in house or to an external application system)

# School’s Applications Manager

- allows schools to create questions for their application forms
- uses JS to make the page interactive
- allows schools view applications made by students
- monitor statistics
- view a students profile

# Students Application System

- allows students to apply internally
- can generate an application form based on the application questions made by a school
