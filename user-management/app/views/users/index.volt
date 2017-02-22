<!--Affiche la liste des utilisateurs-->
   {% if successUserAdd is defined %}
    <div class="ui green message">{{successUserAdd}}</div>
    {% endif %}

    {% if erreurUserAdd is defined %}
    <div class="ui red message">{{erreurUserAdd}}</div>
    {% endif %}

    {% if successUserDelete is defined %}
    <div class="ui green message">{{successUserDelete}}</div>
    {% endif %}

<div class="ui container">
</br>

{{link_to("users/index/1/id/desc","
<button class='ui primary button' >
 <i class='address book icon yellow'></i> Users
</button>")}}

{{link_to("users/form/","
<button class='ui primary button' >
 <i class='add user icon yellow' ></i> Ajouter un nouvel utilisateur
</button>")}}

<div class="ui transparent left icon input">
  <form method="get">
    <input name="filter" type="text" placeholder="Search...">
    <i class="search icon"></i>
  </form>
</div>


<table class="ui inverted table">
  <thead>
    <tr><th><div class="ui checkbox "> <input type="checkbox" name="check"><label></label></div></th>
    {% for colonne in tabColonnes %}
      {% if champActuel == colonne %}
        {% if sensTri == "asc" %}

          <th class="sorted ascending" onclick="window.location.href='{{ href }}/{{colonne}}/desc'"/>
          {% else %}
            <th class="sorted descending" onclick="window.location.href='{{ href }}'"/>
          {% endif %}
        {% else %}
          <th onclick="window.location.href='{{ href }}/{{colonne}}/asc'"/>
        {% endif %}
        {{colonne}} 
                 {% if sensTri == "asc" %} <i class="chevron circle down icon"></i>
                 {% else %} <i class="chevron circle up icon"></i> {% endif %}
          </th>
    {% endfor %}

    <th>Action</th>
    </tr>
  </thead>
  <tbody>
    {% for user in pager.items %} <!-- in users -->
    <tr>
      <td><div class="ui checkbox "> <input type="checkbox" name="check"><label></label></div></td>
      <td>{{user.getId()}} </td>
      <td>{{user.getLogin()}}</td>
      <td>{{user.getFirstname()}}</td>
      <td>{{user.getLastname()}}</td>
      <td>{{user.getEmail()}}</td>
      <td>{{user.getRole().getName()}}</td>
      <td>
        {{linkTo("users/show/"~user.getId(), "<i class='unhide icon yellow'></i>")}} 
        {{linkTo("users/form/"~user.getId(), "<i class='write icon'></i>")}} 
        {{linkTo("users/delete/"~user.getId(), "<i class='erase icon red'></i>")}}
      </td>
    </tr>
   {% endfor %}
  </tbody>
  <tfoot>
    <tr><th colspan="8">
      <div class="ui right floated pagination menu">
        
        
        {{linkTo("users/index/"~pagePrec, "<i class='left chevron icon'></i></a>")}}
        
        <a class="item active">{{pageCourante}}</a>
        
        {{linkTo("users/index/"~pageSuiv, "<i class='right chevron icon'></i></a>")}}
        </a>
      </div>
    </th>
  </tr></tfoot>
</table>
</div>