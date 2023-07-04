<?php
require_once('views/header.php');
?>
<div class="row">
    <div class="col-md-4 ml-8">
        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAALQAAAC0CAMAAAAKE/YAAAAAMFBMVEX6+vrR2eH///+vvczw8vTX3uXN1d60wc/n6+/19vfDzdjr7vHc4ui+ydW5xdLh5uuLqaxwAAAE2klEQVR4nO2c6ZqrIAyGcQARcbn/uz0J4NKpQltodM6T70ddgdcQAgozQvw9/VwN8IkYmkoMTSWGphJDU4mhqcTQVGJoKjE0lRiaSgxNJYamEkNTiaGpxNBUYmgqMTSVGHqVnXWD0rP9RvbfgHYROWC7+gVUh7Zqbh41q9rmrgxtfxNH7rrYNaFtNxwio4auInc1aKsSyAG7mpvUglZp4sit6hRWBfqp7Z1rrsFdDm3doPOwq/Tgir2kFNp27xBH7tJGWQbt3ieO3EVdTgH0J0auY+4S6BJmoL4EWrgi6AIHKfLpXH9yLuhpCsotjR5vhOhNpcG6QufyUme4M3J591IArXW0mN0PoNOC4XVof2rW+groUNE2cr+CrSNxHHNfBQ0gS23bLoO8BmYVH/A66GZrVzAKOSVeRxy7lnspNGBvSEduorfH2gebi6F3XrJWfv7S5dDoAdHa8A6zextf31fsk+/cAXqLZ2tXuXZ8h1HxFtBIub4H2q5bw4U97n/uAt0cfC44+axwK2h4odoNlW13/jJ2J+hmNyJKjqduBg3dn78l3UneDrpBW6v0LfeDRlNnRiMMzdAMzdAMzdAMzdAMzdAMzdAM/d9Apz+j56EvmQlIf0XPQl8z+YnfGc+tnYbWl07JnWKnoHVXVmiFpRPHaOfQ5QuDaixSOZy4PYEum6qNqrQc6NlLDqFL/SKq3sKrIQs93G3hFVA/zsj9hh6crbbIrepiwv2ylUfo4hVAD6q9bHP1kj10Nb+Iqr/WNJp7hQYj33ytqRfOs/gZT6V11eWai760flqFaKyqL+j14pXqVGJoKjE0lRiaSgxNJYamEkNTiaGpxNBUYmgqMTSVGJpKDE0lhqYSQwdJWenPw0+VhJZSh81bWaahe1k+w5WB9uXXgG7G+KXayOGt3I6Ugx5FHej1pK3w/z4y0AYdBKFta6RporWkgaMJrrSyNZMQroenm+FCN0rZI59n9D96wmtSxlqDJNonk2bWkMkcUk9+imaSpscCQ2EfQ+tAgK6IoP1yXva99KXDnnDGH87CAV8rH6AxXTsqONu2doOWYx8zUWKOW0jdj74Z9XJsJnlOnYEWIzgIbGZprFAyNiKfs5YTlA6noYw2HPqdeQ/dSaNikugeARq8bkQTTOjhPoshpJ7g8oyXXcIpc9DOWxsrVGDWeiOw8Nt6cxjp/KH1O2IP3fh0z9Ba7H6G3qAZfOpYEZs7fQINFjQeuokF/oLW+8Ml2GzQ7VLJCegGPGiErb8lXO416nRmLAsN1QibAWsMLLm4x4xuYOJTjN5ccIh1i3WjBN6Jz4BOk4OWYGHcelfBvHxhKeWhHUIDbz+MS2YQVbQ2S+noxY0/hFppMFpg+5v8DqQbB92iC7X6BBouNdKzGt3iji9saM/jeR5aoE8LN2FrX0Ieugx6a/QXjR6Ie1C4nAxAK7jdTBgSMJ20QBQb1jM0xkODbtTKGGNDog+jR9ftNm5bEwMmDEcqnrPLH0yqzsGN/vZ1p/N/D7rcilu/v/9xdsluRM/DRKnp6Y8GTN8ZEqmxGUIMzelG0A59bnqll/8IuquzFOlJ4Ekv3ccvAVRiaCoxNJUYmkoMTSWGphJDU4mhqcTQVGJoKjE0lRiaSgxNJYamEkNTiaGpxNBU+hE/f1D/AB15LBIOLRuUAAAAAElFTkSuQmCC"
             class="img-responsive" alt="a">
    </div>
    <div class="col">

        <div class="row col-md-8">
            <div class="col-md-4">
                <label class="font-weight-bold">Mã sản phẩm</label>
                <p><?php echo $data["code"] ?></p>
            </div>
            <div class="col-md-4">
                <label class="font-weight-bold">Tên sản phẩm</label>
                <p><?php echo $data["name"] ?></p>
            </div>
            <div class="col-md-8">
                <label class="font-weight-bold">Số lượng</label>
                <p><?php echo $data["quanity"] ?></p>
            </div>
        </div>
        <div class="row row col-md-8">
            <div class="col-md-8">
                <label class="font-weight-bold">Mô tả</label>
                <p><?php echo $data["description"] ?></p>
            </div>
        </div>
    </div>
</div>
