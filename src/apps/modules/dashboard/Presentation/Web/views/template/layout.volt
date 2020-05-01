<!DOCTYPE>
<html>
    <head>
        <style type="text/css">
            body {
                background: #FAFAFA!important;
            }
            {% block style %} {% endblock %}
        </style>
        {% include "template/css.volt" %}
    </head>
    <body>
        <nav class="navbar navbar-expand-lg fixed-top navbar-light" style="background-color:white; box-shadow: 0 4px 2px -2px rgba(0,0,0,.2);">
            <a class="navbar-brand mb-0 h1 ml-2" {% block dilink %} {% endblock %}>connect</a>
            {% block navContent %}{% endblock %}
        </nav>

        {% block content %}{% endblock %}
        {% include "template/js.volt" %}
    </body>
</html>