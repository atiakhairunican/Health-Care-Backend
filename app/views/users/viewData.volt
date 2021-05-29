{% for data in datas %}
{% if loop.first %}
<table border=1 align="center">
    <thead>
        <tr>
            <th>NIK</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Religion</th>
            <th>Phone</th>
            <th>Address</th>
            <th colspan="2">Action</th>
        </tr>
    </thead>
{% endif %}
    <tbody>
        <tr>
            <td>{{ data.nik }}</td>
            <td>{{ data.name }}</td>
            <td>{{ data.sex }}</td>
            <td>{{ data.religion }}</td>
            <td>{{ data.phone }}</td>
            <td>{{ data.address }}</td>
            <td>
                <a href="{{ url('users/edit/' ~ data.id) }}">Edit | </a>
                <a href="{{ url('users/delete/' ~ data.id) }}">Delete</a>
            </td>
        </tr>
    </tbody>
{% if loop.last %}
</table>
{% endif %}
{% else %}
    No Data.
{% endfor %}