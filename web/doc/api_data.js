define({ "api": [
  {
    "type": "delete",
    "url": "/todo/{id}",
    "title": "delete a todo",
    "name": "Delete_Todo",
    "group": "Todo",
    "version": "1.0.2",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "id",
            "description": "<p>id of the Todo item</p>"
          }
        ]
      }
    },
    "filename": "src/AppBundle/Controller/TodoController.php",
    "groupTitle": "Todo"
  },
  {
    "type": "get",
    "url": "/todo/",
    "title": "gets all the Todo items listed",
    "name": "List_Todos",
    "group": "Todo",
    "version": "1.0.2",
    "filename": "src/AppBundle/Controller/TodoController.php",
    "groupTitle": "Todo"
  },
  {
    "type": "post",
    "url": "/todo/",
    "title": "post a new todo",
    "name": "New_Todo",
    "group": "Todo",
    "version": "1.0.2",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>name of the Todo item</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "description",
            "description": "<p>description of the Todo item</p>"
          },
          {
            "group": "Parameter",
            "type": "Date",
            "optional": false,
            "field": "deadline",
            "description": "<p>date of deadline for the Todo item</p>"
          }
        ]
      }
    },
    "filename": "src/AppBundle/Controller/TodoController.php",
    "groupTitle": "Todo"
  },
  {
    "type": "patch",
    "url": "/todo/{id}",
    "title": "patch a todo",
    "name": "Patch_Todo",
    "group": "Todo",
    "version": "1.0.2",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "id",
            "description": "<p>Todo item ID.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": true,
            "field": "name",
            "description": "<p>name of the Todo item</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": true,
            "field": "description",
            "description": "<p>description of the Todo item</p>"
          },
          {
            "group": "Parameter",
            "type": "Date",
            "optional": true,
            "field": "deadline",
            "description": "<p>date of deadline for the Todo item</p>"
          },
          {
            "group": "Parameter",
            "type": "Boolean",
            "optional": true,
            "field": "completed",
            "description": "<p>whether a Todo item is completed</p>"
          }
        ]
      }
    },
    "filename": "src/AppBundle/Controller/TodoController.php",
    "groupTitle": "Todo"
  },
  {
    "type": "put",
    "url": "/todo/{id}",
    "title": "put todo",
    "name": "Put_a_Todo",
    "group": "Todo",
    "version": "1.0.2",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "id",
            "description": "<p>Todo item ID.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>name of the Todo item</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "description",
            "description": "<p>description of the Todo item</p>"
          },
          {
            "group": "Parameter",
            "type": "Date",
            "optional": false,
            "field": "deadline",
            "description": "<p>date of deadline for the Todo item</p>"
          },
          {
            "group": "Parameter",
            "type": "Boolean",
            "optional": false,
            "field": "completed",
            "description": "<p>whether a Todo item is completed</p>"
          }
        ]
      }
    },
    "filename": "src/AppBundle/Controller/TodoController.php",
    "groupTitle": "Todo"
  }
] });
