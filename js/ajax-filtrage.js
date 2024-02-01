jQuery(document).ready(function ($) {
  $('.filter-categorie, .filter-format, .filter-order').change(function () {
    var categorie = $('.filter-categorie').val();
    var format = $('.filter-format').val();
    var order = $('.filter-order').val(); // Récupérer la valeur de tri

    $.ajax({
      url: ajaxurl,
      type: 'POST',
      data: {
        action: 'filtrer_photos',
        categorie: categorie,
        format: format,
        order: order, // Envoyer la valeur de tri
      },
      success: function (response) {
        $('.photo-grid').html(response);
      },
    });
  });
});

jQuery(document).ready(function ($) {
  var currentCategorie = $('.filter-categorie').val();
  var currentFormat = $('.filter-format').val();
  var currentOrder = $('.filter-order').val();

  function loadMorePhotos(page) {
    $.ajax({
      url: ajaxurl,
      type: 'POST',
      data: {
        action: 'filtrer_photos',
        categorie: currentCategorie,
        format: currentFormat,
        order: currentOrder,
        page: page,
      },
      success: function (response) {
        if (page === 1) {
          $('.photo-grid').html(response);
        } else {
          $('.photo-grid').append(response);
        }

        if (
          $('#no-more-posts').length > 0 ||
          $(response).filter('.photo-item').length < 8
        ) {
          $('#load-more').hide();
        } else {
          $('#load-more').show().data('page', page);
        }
      },
    });
  }

  $('.filter-categorie, .filter-format, .filter-order').change(function () {
    currentCategorie = $('.filter-categorie').val();
    currentFormat = $('.filter-format').val();
    currentOrder = $('.filter-order').val();

    loadMorePhotos(1); // Réinitialiser et charger la première page
  });

  $('#load-more').click(function () {
    var page = $(this).data('page') + 1;
    loadMorePhotos(page);
  });
});
