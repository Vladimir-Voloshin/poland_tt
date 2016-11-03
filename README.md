Rest Api
========================

Symfony 3.0 REST API Project Recruitment Test Task

Task
--------------

Your task is to create API for TODO list

GET - list of todos

POST - create new todo

PUT - edit todo item

DELETE - delete todo item

PATCH - to complete todo item

```

GET /todo
PUT /todo/{id}
POST /todo
DELETE /todo/{id}
PATCH /todo/{id}

```

Every todo item have

name - max 255 chars cannot be null

description - text type can be null

deadline - dateTime type cannot be null, only date from future

completed - boolean type cannot be null

To test API you could use Curl or Postman.

(https://chrome.google.com/webstore/detail/postman/fhbjgbiflinjbdggehcddcbncdddomop)

API documentation is avalible at (http://localhost.dev:8080/doc). Your job is also to add actons to this documentation. Nelmio API Bundle

On job interview we perform code review for your work.
