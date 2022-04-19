@extends('amc.layouts.app')

@section('content')

<div class="container-fluid bdy dashboard">
    <div class="settings">
        <i class="priya-caret-right setting-btn"></i>
        <div class="settings-content">
            <label class="pri-check">
                <input type="checkbox" value="1" data-cls="fixed-header"><i></i>
                Fixed Header
            </label>
            <label class="pri-check">
                <input type="checkbox" value="1" data-cls="fixed-header-footer"><i></i>
                Fixed Header & Footer
            </label>
            <label class="pri-check">
                <input type="checkbox" value="1" data-cls="no-gap"><i></i>
                No Gap Dashboard
            </label>
        </div>
    </div>
</div>

<div id="add-dist-help" class="help-modal" style="display: none;">
    <div class="help-modal-content pop-xl">
        <i class="priya-close" onclick="helpModalHide(this)"></i>
        <header>Title</header>
        <section>
            <h4>Description</h4>
            <p> </p>
            <ul>
                <li>Any list text</li>
                <li>Any list text</li>
                <li>Any list text</li>
                <li>Any list text</li>
            </ul>

            <ol>
                <li>Ordered list text</li>
                <li>Lipsum gentre suanaw</li>
                <li>Gasdrf bhue knnn lkion</li>
            </ol>
        </section>
    </div>
</div>

@endsection