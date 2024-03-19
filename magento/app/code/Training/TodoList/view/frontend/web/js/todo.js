define(["ko", "uiComponent", "jquery"], function (ko, Component, $) {
    "use strict";
    return Component.extend({
        tasks: ko.observable(""),
        task: ko.observable(""),
        initialize: function (config) {
            console.log(config);
            this._super();
        },
        create() {
            $.ajax({
                url: "/todo/todo/create",
                data: {
                    text: this.task(),
                },
                method: "POST",
                success: function (todoList) {
                    updateList($, todoList);
                },
            });
        },
        update(id, is_complete) {
            $.ajax({
                url: "/todo/todo/update",
                data: {
                    id,
                    is_complete,
                },
                method: "POST",
                success: function (todoList) {
                    updateList($, todoList);
                },
            });
        },
        delete() {
            $.ajax({
                url: "/todo/todo/delete",
                data: {
                    id: 0, // TODO
                },
                method: "POST",
                success: function (todoList) {
                    updateList($, todoList);
                },
            });
        },
    });
});

function updateList($, todoList) {
    var $list = $("ul#todo_list");
    $list.empty();
    if (todoList.length > 0) {
        $.each(todoList, function (index, item) {
            console.log(item);
            var $li = $("<li>");
            var $textSpan = $("<span>").text(item.text);
            var $statusSpan = $("<span>")
                .text(item.is_complete === "1" ? "(Completed)" : "(Pending)")
                .css("color", item.is_complete === "1" ? "green" : "red");
            var $updateForm = $(
                '<form action="/todo/todo/update" method="post">'
            ).append(
                $('<input type="hidden" name="id">').val(item.id),
                $('<input type="hidden" name="is_complete">').val(
                    !item.is_complete
                ),
                $('<input type="submit">').val(
                    !item.is_complete ? "Выполнено" : "Не выполнено"
                )
            );
            var $deleteForm = $(
                '<form action="/todo/todo/delete" method="post">'
            ).append(
                $('<input type="hidden" name="id">').val(item.id),
                $('<input type="submit">').val("Удалить")
            );
            $li.append($textSpan, $statusSpan, $updateForm, $deleteForm);
            $list.append($li);
        });
    } else {
        $list.append("<li>No items found.</li>");
    }
}
