@extends('layouts.app')
@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-body">
          <form method="POST" action="{{ route('charts.update', $chart->id) }}">
            @csrf
            @method('PUT')
            <h2>編輯應用程式</h2>
            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label">應用程式名稱*</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="name" value="{{ $chart->name }}">
              </div>
            </div>
            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label">圖片*</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="icon" value="{{ $chart->icon }}">
              </div>
            </div>
            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label">說明*</label>
              <div class="col-sm-10">
                <textarea class="form-control" name="description" rows="3">{{ $chart->description }}</textarea>
              </div>
            </div>
            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label">YML*</label>
              <input name="yml" id="yml" type="hidden"/>
              <div id="editor" style="height: 500px" name="test">{{ $chart->yml }}</div>
            </div>
            <div class="d-flex flex-row-reverse">
              <button type="submit" class="btn btn-primary">送出</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.14/ace.min.js"
  integrity="sha512-hDyKEpCc9jPn3u2VffFjScCtNqZI+BAbThAhhDYqqqZbxMqmTSNIgdU0OU9BRD/8wFxHIWLAo561hh9fW7j6sA=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.14/mode-yaml.min.js"
  integrity="sha512-VUeuCa6fUR6uovoS+4zLs1st+YAh4MS3crFQGZxZQU2ePinr3LygtHPPEDxNcxnifSMbjLaOZTd5rKsAJ0vIPQ=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
var editor = ace.edit("editor");
var yaml = ace.require("ace/mode/yaml").Mode;
editor.session.setMode(new yaml());
var textarea = document.getElementById("yml");
editor.getSession().on("change", function () {
    textarea.value = editor.getSession().getValue();
});
</script>
@endsection