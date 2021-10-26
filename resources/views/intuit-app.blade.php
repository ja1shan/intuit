<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">

        <title>Intuit App</title>
        <script nonce="{$csp_nonce}"></script>
    </head>
    <body>
        <div id="app">
            <div v-if="loading" class="has-text-centered" >
                <img src="/spinner.svg" />
            </div>
            <div v-else>
                <div class="columns">
                    <div class="column is-narrow">
                        <sidebar-nav :entities="entities" :selected-entity="selectedEntityKey" @click="(value) => selectedEntityKey = value"></sidebar-nav>
                    </div>
                    <div class="column">
                        <header-view
                            :title="selectedEntityData.title"
                            :description="selectedEntityData.description"
                            class="box"
                        ></header-view>
                        <sample-object-container
                            :name="selectedEntityData.title"
                            :sample-object="selectedEntityData.sample_object"
                            class="box"
                        ></sample-object-container>
                        <query-container
                            :name="selectedEntityData.title"
                            :query-object="selectedEntityData.query_object"
                            class="box"
                        ></query-container>
                        <read-container
                            :name="selectedEntityData.title"
                            :query-object="selectedEntityData.read_object"
                            class="box"
                        ></read-container>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript" src="js/app.js"></script>
    </body>
</html>
