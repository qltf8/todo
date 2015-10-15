//This controller will now respond to user action by using its newTitle property as the title of a new todo whose isCompleted property is false. Then it will clear its newTitle property which will synchronize to the template and reset the textfield. Finally, it persists any unsaved changes on the todo.

Todos.TodosController = Ember.ArrayController.extend({
  actions: {
    createTodo: function () {
      // Get the todo title set by the "New Todo" text field
      var title = this.get('newTitle');
      if (!title.trim()) { return; }

      // Create the new Todo model
      var todo = this.store.createRecord('todo', {
        title: title,
        isCompleted: false
      });

      // Clear the "New Todo" text field
      this.set('newTitle', '');

      // Save the new model
      todo.save();
    }
  },
	removeTodo: function () {
      var todo = this.get('model');
      todo.deleteRecord();
      todo.save();
    },
  remaining: function () {
    return this.filterBy('isCompleted', false).get('length');
  }.property('@each.isCompleted'),

  inflection: function () {
    var remaining = this.get('remaining');
    return remaining === 1 ? ' incompleted item' : 'incompleted items';
  }.property('remaining')
});





//When called from the template to display the current isCompleted state of the todo, this property will proxy that question to its underlying model. When called with a value because a user has toggled the checkbox in the template, this property will set the isCompleted property of its model to the passed value (true or false), persist the model update, and return the passed value so the checkbox will display correctly.

Todos.TodoController = Ember.ObjectController.extend({
  actions: {
    
    removeTodo: function () {
      var todo = this.get('model');
      todo.deleteRecord();
      todo.save();
    }
  },

  isEditing: false,

  isCompleted: function(key, value){
    var model = this.get('model');

    if (value === undefined) {
      // property being used as a getter
      return model.get('isCompleted');
    } else {
      // property being used as  setter
      model.set('isCompleted', value);
      model.save();
      return value;
    }
  }.property('model.isCompleted')
});




