{% extends "template/layout.volt" %}
{% block dilink %}
    href="{{ url('dashboard/index/home') }}"
{% endblock %}
{% block navContent %}
    <div class="collapse navbar-collapse mb-0" id="navbarSupportedContent">
        <ul class="navbar-nav ml-3 mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('dashboard/index/profile') }}">Profile</span></a>
            </li>
        </ul>
    </div>
    <a class="nav-link" href="{{ url('dashboard/index/logout') }}">Logout</a>
{% endblock %}

{% block content %}
    <div class="container text-center" style="width:40%; margin-top: 7%; background-color: white; border: 1px solid lightgray;">
        <input type="text" placeholder="Search" style="margin-top: 4%; width : 100%;" onkeyup="myFunction()" id="myInput">
        <form action="{{ url('dashboard/index/teman') }}" method="POST" enctype="multipart/form-data">
        <ul style="list-style-type: none; margin: 0; padding: 0; margin-bottom: 5%;" id="myUL">
            {% for user in listUser %}
                {% if user.getUsername() == uname %}
                    {% continue %}
                {% endif %}
                <li style="background-color: #FAFAFA; width: 100%; border: 1px solid lightgray; display: none;">
                    <a>{{ user.getUsername() }}</a>
                        <button style="float: right; margin-right: 4%;" type="submit" id="update">
                            <input type="hidden" name="usernameTeman" value="{{ user.getUsername() }}">

                            {% set flag = false %}
                            {% for friend in friendList %}
                                {% if user.getUsername() == friend.getUsernameTeman() %}
                                    {% set flag = true %}
                                    {% break %}
                                {% endif %}
                            {% endfor %}
                            {% if flag == true %}
                                <i class="fa fa-check"></i>
                                <input type="hidden" name="jenis" value="delete">
                            {% else %}
                                <input type="hidden" name="jenis" value="add">
                                <i class="fa fa-plus"></i>
                            {% endif %}
                        </button>
                </li>
            {% endfor %}
        </ul>
        </form>
    </div>
{% endblock %}