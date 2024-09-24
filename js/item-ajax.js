$(document).ready(function () {
  getPageData();

//  Get Page Data
  function getPageData() {
    $.ajax({
      dataType: "json",
      url: url + "./api/getData.php",
    }).done(function (data) {
      console.log(data.data);
      manageRow(data.data);
    });
  }

  /* Add new Item table row */
  function manageRow(data) {
    var rows = "";
    $.each(data, function (key, value) {
      rows = rows + "<tr>";
      rows = rows + "<td>" + value.id + "</td>";
      rows = rows + "<td>" + value.name + "</td>";
      rows = rows + "<td>" + value.address + "</td>";
      rows = rows + "<td>" + value.salary + "</td>";
      rows = rows + '<td data-id="' + value.id + '">';
      rows = rows + '<a data-toggle="modal" data-target="#edit-item" class="glyphicon glyphicon-pencil edit-item"></a> ';
      rows = rows + '<a class="glyphicon glyphicon-trash remove-item"></a>';
      rows = rows + "</td>";
      rows = rows + "</tr>";
    });
    $("tbody").html(rows);
  }

  /* Create new Item */
  $(".crud-submit").click(function (e) {
    e.preventDefault();
    var form_action = $("#create-item").find("form").attr("action");
    var name = $("#create-item").find("input[name='name']").val();
    var address = $("#create-item").find("input[name='address']").val();
    var salary = $("#create-item").find("input[name='salary']").val();

      $.ajax({
        dataType: "json",
        type: "POST",
        url: url + form_action,
        data: { name: name, address: address, salary: salary },
      }).done(function (data) {
        $("#create-item").find("input[name='name']").val("");
        $("#create-item").find("input[name='address']").val("");
        $("#create-item").find("input[name='salary']").val("");
        getPageData();
        $(".modal").modal("hide");
        toastr.success("Item Created Successfully.", "Success Alert", {
          timeOut: 5000,
        });
      });
  });
  /* Remove Item */
  $("body").on("click", ".remove-item", function () {
    var id = $(this).parent("td").data("id");
    var c_obj = $(this).parents("tr");
    $.ajax({
      dataType: "json",
      type: "POST",
      url: url + "api/delete.php",
      data: { id: id },
    }).done(function (data) {
      c_obj.remove();
      toastr.success("Item Deleted Successfully.", "Success Alert", {
        timeOut: 5000,
      });
      getPageData();
    });
  });

  /* Edit Item */
  $("body").on("click", ".edit-item", function () {
    var id = $(this).parent("td").data("id");
    var name = $(this).parent("td").prev("td").prev("td").prev("td").text();
    var address = $(this).parent("td").prev("td").prev("td").text();
    var salary = $(this).parent("td").prev("td").text();
    $("#edit-item").find("input[name='name']").val(name);
    $("#edit-item").find("input[name='address']").val(address);
    $("#edit-item").find("input[name='salary']").val(salary);
    $("#edit-item").find(".edit-id").val(id);
  });

  /* Updated new Item */
  $(".crud-submit-edit").click(function (e) {
    e.preventDefault();
    var form_action = $("#edit-item").find("form").attr("action");
    var name = $("#edit-item").find("input[name='name']").val();
    var address = $("#edit-item").find("input[name='address']").val();
    var salary = $("#edit-item").find("input[name='salary']").val();
    var id = $("#edit-item").find(".edit-id").val();
      $.ajax({
        dataType: "json",
        type: "POST",
        url: url + form_action,
        data: { name: name, address: address,salary: salary  , id: id },
      }).done(function (data) {
        getPageData();
        $(".modal").modal("hide");
        toastr.success("Item Updated Successfully.", "Success Alert", {
          timeOut: 5000,
        });
      });
  });
});