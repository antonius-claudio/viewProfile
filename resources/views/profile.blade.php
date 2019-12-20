<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Profile</title>
    {{-- bootstrap --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/style.css">
    {{-- JQuery --}}
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    {{-- AJAX --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
    <h3>View Random User</h3> <br>
    <hr>
    <div class="row">
        <div class="col-md-6 profil">
            <div class="row">
                <div class="col-md-2" id="img">
                </div>
                <div class="col-md-10 nameuser" id="name">
                </div>
                <div class="col-md-2 mobile">
                    Gender
                </div>
                <div class="col-md-1 mobile">:</div>
                <div class="col-md-9" id="gender">
                </div>

                <div class="col-md-2 mobile">
                    Birth
                </div>
                <div class="col-md-1 mobile">:</div>
                <div class="col-md-9" id="dob">
                </div>

                <div class="col-md-2 mobile">
                    Address
                </div>
                <div class="col-md-1 mobile">:</div>
                <div class="col-md-9" id="loc">
                </div>

                <div class="col-md-2 mobile">
                    Location
                </div>
                <div class="col-md-1 mobile">:</div>
                <div class="col-md-9" id="coor">
                </div>

                <div class="col-md-2 mobile">
                    Timezone
                </div>
                <div class="col-md-1 mobile">:</div>
                <div class="col-md-9" id="time">
                </div>

                <div class="col-md-2 mobile">
                    Email
                </div>
                <div class="col-md-1 mobile">:</div>
                <div class="col-md-9" id="email">
                </div>

                <div class="col-md-2 mobile">
                    Phone
                </div>
                <div class="col-md-1 mobile">:</div>
                <div class="col-md-9" id="phone">
                </div>

                <div class="col-md-2 mobile">
                    Cell
                </div>
                <div class="col-md-1 mobile">:</div>
                <div class="col-md-9" id="cell">
                </div>

                <div class="col-md-2 mobile">
                    Username
                </div>
                <div class="col-md-1 mobile">:</div>
                <div class="col-md-9" id="username">
                </div>

                <div class="col-md-2 mobile">
                    Password
                </div>
                <div class="col-md-1 mobile">:</div>
                <div class="col-md-9" id="password">
                </div>

                <div class="col-md-2 mobile">
                    Registered
                </div>
                <div class="col-md-1 mobile">:</div>
                <div class="col-md-9" id="registered">
                </div>

                <div class="col-md-2 mobile">
                    ID
                </div>
                <div class="col-md-1 mobile">:</div>
                <div class="col-md-9" id="idname">
                </div>
            </div>
        </div>
    </div>
    <a href="{{route('home')}}" class="btn btn-info">back</a>
    
</body>
    <script>
        $(function () {
            $.ajax({
                method: 'get',
                accepts: 'application/json',
                url: " https://randomuser.me/api/", 
                success: function(response){
                    let results = response.results;
                    console.log(results);
                    if(results.length > 0) {
                        for (let key of Object.keys(results[0].name)) {
                            $("#name").append(results[0].name[key] +' ');
                        }

                        $('#gender').text(results[0].gender);

                        $('#img').html('<img class="photo" src="'+ results[0].picture.large +'"/>');

                        var dob = new Date(results[0].dob.date)
                        $('#dob').append(dob.getDate()+'-'+(dob.getMonth()+1)+'-'+dob.getFullYear() +' ('+ results[0].dob.age +' years)');

                        $('#loc').append(results[0].location.street.name +' No.'+ results[0].location.street.number +
                            ', '+ results[0].location.city +', '+ results[0].location.state +', '+ results[0].location.country +', '+ results[0].location.postcode);

                        $('#coor').html('<a href="https://www.google.com/maps/search/?api=1&query='+ results[0].location.coordinates.latitude +','+ results[0].location.coordinates.longitude +
                         '">See Location</a>')

                        $('#time').append(results[0].location.timezone.offset + ', ' + results[0].location.timezone.description);

                        $('#email').html('<a href="mailto:'+ results[0].email +'">'+ results[0].email +'</a>');

                        $('#phone').html('<a href="tel:'+ results[0].phone +'">'+ results[0].phone +'</a>');

                        $('#cell').html('<a href="tel:'+ results[0].cell +'">'+ results[0].cell +'</a>');

                        $('#username').text(results[0].login.username);

                        $('#password').text(results[0].login.password);

                        var regdate = new Date(results[0].registered.date)
                        $('#registered').append(regdate.getDate()+'-'+(regdate.getMonth()+1)+'-'+regdate.getFullYear() + ' ('+ results[0].registered.age +' years)');

                        $('#idname').append(results[0].id.name + '-'+ results[0].id.value);

                    }
                    console.log(response);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        })
    </script>
</html>