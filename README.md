# job_board

10. Job Board
Models: Job, Company, Application
Relationships:
A Company hasMany Jobs. A Job belongsTo a Company.
An Application belongsTo a Job. An Application can also belongTo a User applying.
CRUD:
Manage companies (company_name, location, etc.).
Manage jobs (title, description, company_id).
Manage applications (user_id, job_id, cover_letter, etc.).
