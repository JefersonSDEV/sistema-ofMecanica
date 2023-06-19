$(document).ready(function () {
  $(".js-slider").slick({
    dots: false,
    infinite: true,
    speed: 300,
    arrows: false,
    slidesToShow: 4,
    slidesToScroll: 4,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
        },
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
        },
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  });
});



function handleRating(rating) {
  let htmlToReturn = "";
  const maximumRatingStars = 5;

  for (let i = 0; i < rating; i++) {
    htmlToReturn = htmlToReturn + "&#9733;";
  }

  for (let j = 0; j < maximumRatingStars - rating; j++) {
    htmlToReturn = htmlToReturn + "&#9734;";
  }

  return htmlToReturn;
}

function handlePrice(price, discount = false) {
  if (discount) {
    price = price * 0.9;
    // price *= 0.9;
  }
  return price.toLocaleString("pt-BR", {
    style: "currency",
    currency: "BRL",
  });
}
  /*
<div class="rating">
${handleRating(el.rating)}
</div>
*/