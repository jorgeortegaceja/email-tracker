<!DOCTYPE html>
<html lang="es">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>
        Email Traker
        @section('name')
        @show
    </title>

    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
</head>
<body>

    <div id="app">
        <v-app>
             <v-app-bar
                absolute
                color="blue darken-3"
                dark
                elevate-on-scroll
                scroll-target="#scrolling-techniques-7"
                class="mb-3"
            >
                <v-app-bar-nav-icon></v-app-bar-nav-icon>

                <v-toolbar-title>
                    Email tracker
                    @section('name')
                    @show
                </v-toolbar-title>

                <v-spacer></v-spacer>
            </v-app-bar>

            @yield('app')
            <v-main   id="scrolling-techniques-7">
                <v-container class="mt-3">
                    @section('table')
                    @show
                </v-container>
            </v-main>
        </v-app>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>
        @section('script')
        @show
    <script>
        var vue = new Vue({
            el: '#app',
            vuetify: new Vuetify(),
        });
    </script>
</body>
</html>
