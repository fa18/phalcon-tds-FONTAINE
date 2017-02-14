<!--Affiche la liste des utilisateurs-->
<div class="ui container">
</br>
{{link_to("users/form/update","
<button class='ui primary button' >
 <i class='add user icon yellow' ></i> Ajouter un nouvel utilisateur
</button>")}}
<div class="ui transparent left icon input">
  <input type="text" placeholder="Search...">
  <i class="search icon"></i>
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
        {{colonne}}</th>
    {% endfor %}

    <th>Action</th>
    </tr>
  </thead>
  <tbody>
    {% for user in users %}
    <tr>
      <td><div class="ui checkbox "> <input type="checkbox" name="check"><label></label></div></td>
      <td>{{user.getId()}}</td>
      <td>{{user.getLogin()}}</td>
      <td>{{user.getFirstname()}}</td>
      <td>{{user.getLastname()}}</td>
      <td>{{user.getEmail()}}</td>
      <td>{{user.getRole().getName()}}</td>
      <td>
        {{linkTo("users/form/update", "<i class='write icon'></i>")}}
        {{linkTo("users/form/delete", "<i class='erase icon red'></i>")}}
      </td>
    </tr>
   {% endfor %}
  </tbody>
  <tfoot>
    <tr><th colspan="8">
      <div class="ui right floated pagination menu">
        <a class="icon item">
          <i class="left chevron icon"></i>
        </a>
        <a class="item active">1</a>
        <a class="item">2</a>
        <a class="item">3</a>
        <a class="item">4</a>
        <a class="icon item">
          <i class="right chevron icon"></i>
        </a>
      </div>
    </th>
  </tr></tfoot>
</table>
</div>