<div class="container">
    <div class="row">
        <div col s12>
    <h1>Geplante Trips</h1>
        </div>

    <div class="row">
        <div col s12>
            <table class="highlight centered striped">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Ziel</th>
                    <th>Start am</th>
                </tr>
                </thead>
                <tbody>
                {foreach $trips as $trip}
                    <tr>
                        <td><a class="link" href="#trip/display/{$trip->id}">{$trip->title}</a></td>
                        <td>{$trip->destination}</td>
                        <td>{$trip->dateStart}</td>
                    </tr>
                {/foreach}
                </tbody>
            </table>
        </div>
    </div>
</div>
