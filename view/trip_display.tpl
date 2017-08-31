<div class="container">
    <div class="row">
        <div class="col s12">
            <h1>{$trip->title}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col s4">
            <b>Wohin:</b> {$trip->destination}
        </div>
        <div class="col s4">
            <b>Wann:</b> {$trip->dateStart}
        </div>
        <div class="col s4">
            <b>Bis:</b> {$trip->dateEnd}
        </div>
    </div>
    <hr/>
    <h2>
        Teilnehmer
    </h2>
    <div class="row">
        <div class="col s12">
            <label>Add Member</label>
            <input placeholder="E-Mail" name="title" type="text" class="validate">
        </div>
    </div>
    <div class="row">
        <div class="col s12">
        <span>Es nehmen bereits teil:</span>
        </div>
    </div>
    <div class="row">
        {foreach $members as $member}
            <div class="col s2 card-panel green darken-1">
                <div class="member-card">
                    {$member->name}
                </div>
            </div>
        {/foreach}
    </div>
</div>