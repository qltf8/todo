
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Ember.js • TodoMVC</title>
  <link rel="stylesheet" href="style.css">
 </head>
<body>
  <script type="text/x-handlebars" data-template-name="todos/index">
  <ul id="todo-list">
          {{#each todo in model itemController="todo"}}
			<!--This code will apply the CSS class completed when the todo's isCompleted property is true and remove it when the property becomes false.-->
            <li {{bind-attr class="todo.isCompleted:completed"}}>
             {{input type="checkbox" checked=todo.isCompleted class="toggle"}}
              <label>{{todo.title}}</label>
			 <!-- Clicking this button will remove the todo and update the display of remaining incomplete todos and remaining completed todos appropriately.-->
			  <button {{action "removeTodo"}} class="destroy"></button>
            </li>
          {{/each}}
        </ul>

  </script>

  <script type="text/x-handlebars" data-template-name="todos">

  <section id="todoapp">
    <header id="header">
      <h1>Todo List</h1>
      {{input type="text" id="new-todo" placeholder="What needs to be done?" 
              value=newTitle action="createTodo"}}
    </header>

      <section id="main">
        {{outlet}}
        <input type="checkbox" id="toggle-all">
      </section>

      <footer id="footer">
        <span id="todo-count">
          <strong>{{remaining}}</strong> {{inflection}} left</span>
        <ul id="filters">
          <li>
            {{#link-to "todos.index" activeClass="selected"}}All{{/link-to}}
          </li>
          <li>
            {{#link-to "todos.active" activeClass="selected"}}Active{{/link-to}}
          </li>
          <li>
            {{#link-to "todos.completed" activeClass="selected"}}Completed{{/link-to}}
          </li>
        </ul>
      </footer>
  </section>

  
  </script>

  <script src="http://emberjs.com.s3.amazonaws.com/getting-started/jquery.min.js"></script>
  <script src="http://emberjs.com.s3.amazonaws.com/getting-started/handlebars.js"></script>
  <script src="http://emberjs.com.s3.amazonaws.com/getting-started/ember.js"></script>
  <script src="http://emberjs.com.s3.amazonaws.com/getting-started/ember-data.js"></script>
  <script src="http://emberjs.com.s3.amazonaws.com/getting-started/local_storage_adapter.js"></script>
  <script src="js/application.js"></script>
  <script src="js/router.js"></script>
  <script src="js/models_todo.js"></script>
  <script src="js/todos_controller.js"></script>
  </body>
</html>

