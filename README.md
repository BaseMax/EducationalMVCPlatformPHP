# Educational Platform MVC PHP

This is an educational platform where users can access and consume educational content such as videos, lectures, and quizzes. The platform also includes features for user authentication, progress tracking, and quiz grading.

## Features

- User authentication
- Upload and manage educational content such as videos, lectures, and quizzes
- Progress tracking for users to keep track of their progress through educational content
- Quiz grading to evaluate user knowledge and understanding

## API Routes

### Authentication

- `POST /api/register`: Register a new user

```console
  curl --location 'http://localhost:5000/api/register' \
  --header 'Content-Type: application/x-www-form-urlencoded' \
  --data-urlencode 'name=fakename' \
  --data-urlencode 'email=fakename@gmail.com' \
  --data-urlencode 'password=fakepass'
```

Response:

```json
{
    "token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.WyJBbGlBaG1hZGkiLCJBbGlBaG1hZGlAZ21haWwuY29tIiwiJDJ5JDEwJFV2RE9pM3dVMFVJdE1jOWVkS09nWHVWVWdOdEFEWmw0MmdtZ0RIQzI5VVVWbkgzUHhhQkVTIl0.pJrm81UK1aysfLWM2tyzeWDTugsdoBqBZj3vsj9z1OA"
}
```

- `POST /api/login`: Login a user

```console
  curl --location 'http://localhost:5000/api/login' \
  --header 'Content-Type: application/x-www-form-urlencoded' \
  --data-urlencode 'name=fakename' \
  --data-urlencode 'email=fakename@gmail.com' \
  --data-urlencode 'password=fakepass'
```

Response:

```json
{
    "token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.WyJBbGlBaG1hZGkiLCJBbGlBaG1hZGlAZ21haWwuY29tIiwiJDJ5JDEwJFV2RE9pM3dVMFVJdE1jOWVkS09nWHVWVWdOdEFEWmw0MmdtZ0RIQzI5VVVWbkgzUHhhQkVTIl0.pJrm81UK1aysfLWM2tyzeWDTugsdoBqBZj3vsj9z1OA"
}
```

### Content

- `GET /api/content`: Get a list of all content
- `GET /api/content/{id}`: Get specific content by ID
- `POST /api/content`: Upload new content
- `PUT /api/content/{id}`: Update existing content
- `DELETE /api/content/{id}`: Delete existing content

### Progress

- `GET /api/progress`: Get a list of all progress for a user
- `POST /api/progress`: Update progress for a user

### Quizzes

- `GET /api/quizzes`: Get a list of all quizzes
- `GET /api/quizzes/{id}`: Get specific quiz by ID
- `POST /api/quizzes`: Create a new quiz
- `PUT /api/quizzes/{id}`: Update an existing quiz
- `DELETE /api/quizzes/{id}`: Delete an existing quiz

### Questions

- `GET /api/quizzes/{quiz_id}/questions`: Get a list of all questions for a specific quiz
- `GET /api/quizzes/{quiz_id}/questions/{id}`: Get a specific question by ID for a specific quiz
- `POST /api/quizzes/{quiz_id}/questions`: Create a new question for a specific quiz
- `PUT /api/quizzes/{quiz_id}/questions/{id}`: Update an existing question for a specific quiz
- `DELETE /api/quizzes/{quiz_id}/questions/{id}`: Delete an existing question for a specific quiz

### Answers

- `GET /api/questions/{question_id}/answers`: Get a list of all answers for a specific question
- `GET /api/questions/{question_id}/answers/{id}`: Get a specific answer by ID for a specific question
- `POST /api/questions/{question_id}/answers`: Create a new answer for a specific question
- `PUT /api/questions/{question_id}/answers/{id}`: Update an existing answer for a specific question
- `DELETE /api/questions/{question_id}/answers/{id}`: Delete an existing answer for a specific question

Note: This is just an example list of API routes, and you may need to modify it based on the specific requirements.

## Database Schema

### Users

- `id`: int (primary key)
- `name`: varchar(255)
- `email`: varchar(255)
- `password`: varchar(255)
- `created_at`: timestamp
- `updated_at`: timestamp

### Content

- `id`: int (primary key)
- `title`: varchar(255)
- `description`: text
- `type`: enum('video', 'lecture', 'quiz')
- `content_file`: varchar(255) (path to file)
- `created_at`: timestamp
- `updated_at`: timestamp

### Progress

- `id`: int (primary key)
- `user_id`: int (foreign key to Users table)
- `content_id`: int (foreign key to Content table)
- `completed`: boolean
- `created_at`: timestamp
- `updated_at`: timestamp

### Quizzes

- `id`: int (primary key)
- `content_id`: int (foreign key to Content table)
- `title`: varchar(255)
- `created_at`: timestamp
- `updated_at`: timestamp

### Questions

- `id`: int (primary key)
- `quiz_id`: int (foreign key to Quizzes table)
- `question`: text
- `created_at`: timestamp
- `updated_at`: timestamp

### Answers

- `id`: int (primary key)
- `question_id`: int (foreign key to Questions table)
- `answer`: text
- `correct`: boolean
- `created_at`: timestamp
- `updated_at`: timestamp

Note: This is just an example schema, and you may need to modify it based on the specific requirements.

## Instalation

Clone this repository and install dependencies:

```console
git clone https://github.com/BaseMax/EducationalMVCPlatformPHP.git
```

```shell
cd EducationalMVCPlatformPHP
composer install
```

Now copy `.env.example` to `.env` and fill database credentials in `.env` file:

```console
cp .env.example .env
```

You can run the project now:

```console
cd public
php -S localhost:5000
```

## Authors

- Ali Ahmadi
- Max Base

Copyright 2023, Max Base
