$(document).ready(() => {

  $('#submit').click(async event => {
    event.preventDefault();

    const input = $('#search').val()
    const number = $('#search').val()
    $('#page').val(1)

    await loadList(0);
  });

  $('#number').change(async event => {
    event.preventDefault();
    $('#page').val(1)
    await loadList(0);
  })

  $("#first").click(async () => {
    await loadList(0);
    $('#page').val(1)
  })

  $("#last").click(async () => {
    const total = $('#total').val()
    const number = $('#number').val()

    const start = (Math.ceil(total / number)) * number - number
    if (start < 0) return;
    await loadList(start);
    $('#page').val(start / number + 1)
  })

  $("#prev").click(async () => {
    const current = $('#current').val()
    const number = $('#number').val()

    const start = current - number
    if (start < 0) return;
    await loadList(start);
    $('#page').val($('#page').val() - 1)
  })

  $("#next").click(async () => {
    const total = $('#total').val()
    const current = $('#current').val()
    const number = $('#number').val()

    const start = Number.parseInt(current) + Number.parseInt(number)
    if (start >= total) return;
    await loadList(start);
    $('#page').val(Number.parseInt($('#page').val()) + Number.parseInt(1))
  })

  $('#page').change(async () => {
    const total = $('#total').val()
    const current = $('#page').val() - 1
    const number = $('#number').val()

    let start = current * number

    if (start < 0) start = 1;
    if (start >= total) start = total - number
    await loadList(start);
    $('#page').val(start / number + 1)
  })

  $(document).on("keydown", async event => {
    if (event.keyCode === 13) {
      const input = $('#search').val()
      const number = $('#search').val()
      $('#page').val(1)

      await loadList(0);
    }
  })

  $(document).on("click", "tr" , function() {
    showModal(this)
  })
})

async function loadList(start) {
  const input = $('#search').val()
  const number = $('#number').val()

  $('#table').load("productView.php", {search: input, start: start, number: number})
}

function showModal(element) {
  //console.log(element.id)
  const children = $(element).children("td")

  const sku = children.eq(1).text()
  const name = children.eq(2).text()
  const desc = children.eq(3).text()
  const price = children.eq(4).html()

  $('#modal-label').html(name + " <small>[sku: " + sku + "]</small>")
  $('#modal-description').text(desc)
  $('#modal-price').html(price)
}