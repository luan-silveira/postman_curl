$(function () {
  var tableRowSelector = ".table-row:not(:last):not(.tr-active)";

  $(".table")
    .on("click", ".table-row", function () {
      $(".table-row").removeClass("tr-active");
      $(this).addClass("tr-active");
      $(this).find(".btn-delete").hide();
    })
    .on("mouseover", tableRowSelector, function (e) {
      $(this).find(".btn-delete").show();
    })
    .on("mouseleave", tableRowSelector, function (e) {
      $(this).find(".btn-delete").hide();
    });

  $(".table")
    .on("input", ".input-key, .input-value", function () {
      var _this = $(this);
      var tbody = _this.closest("tbody");
      var tr = _this.closest("tr");

      if (_this.val() !== "") {
        if (tr.index() == tbody.find("tr").length - 1) {
          adicionarLinha(tbody);
          tr.find(".check").prop("checked", true).show();
          tr.find("input:text").attr("placeholder", "");
        }
      }
    })
    .on("click", ".check", function () {
      $(this)
        .closest('tr')
        .find("input:text")
        .toggleClass("input-unchecked", !$(this).is(":checked"));
    })
    .on("click", ".btn-delete", function (e) {
      $(this).closest("tr").remove();
      return false;
    });

    $('#request-body input:radio').click(function(){
        var target = $(this).data('target');
        $('#request-body .tab-pane').removeClass('active');
        $(target).addClass('active');
    });

    $('#raw-type').change(function(){
      rawEditor.setOption('mode', 'ace/mode/' + $(this).val().toLowerCase());
    })

    $('#response-raw-type').change(function(){
      responseEditor.setOption('mode', 'ace/mode/' + $(this).val().toLowerCase());
    })


});

function adicionarLinha(objTbody) {
  var name = objTbody.parent().data('name') || 'table';
  var row =
    '<tr class="table-row">' +
    '    <th scope="col" style="text-align: center; vertical-align: middle">' +
    '        <input class="check" type="checkbox" style="display: none;" name="' + name + '-check[]">' +
    "    </th>" +
    '    <td class="td-key">' +
    '        <input class="form-control form-control-sm input-key" type="text" name="' + name + '-key[]" placeholder="Chave">' +
    "    </td>" +
    '    <td class="td-value">' +
    '        <input class="form-control form-control-sm input-value" type="text" name="' + name + '-key[]" placeholder="Valor">' +
    "    </td>" +
    '    <td class="td-delete">' +
    '        <a href="#" class="btn-delete" style="display: none;"><img class="img-delete"></a>' +
    "    </td>";
  +"</tr>";

  objTbody.append(row);
}
