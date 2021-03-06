<form id="add-form" method="post" action="#" autocomplete="off">
    <input type="hidden" id="agent_id" name="agent_id" value="<?php echo $agent_id; ?>">
    <input type="hidden" id="project_id" name="project_id" value="<?php echo $project_id; ?>">
    <div class="card">
        <div class="card-body p-b-0">
            <h4 class="card-title">
                เพิ่ม Intents
                <span style="float: right">
                    <button type="button" id="btn-add-form" class="btn btn-sm btn-outline-info"><i id="fa-add-form" class="fa fa-save"></i> บันทึก</button>
                </span>
            </h4>
            <h6 class="card-subtitle">-</h6>
        </div>
        <ul class="nav nav-tabs customtab" role="tablist">
            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#tab1" role="tab">Intent</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab2" role="tab">Training Phrases</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab3" role="tab">Parameters</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab4" role="tab">Responses</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane p-20 active" id="tab1" role="tabpanel">
                <h6 class="card-title">Display Name</h6>
                <div class="form-group">
                    <input type="text" name="displayName" value="" class="form-control form-control-sm" required>
                </div>
            </div>
            <div class="tab-pane p-20 " id="tab2" role="tabpanel">
                <h6 class="card-title">Training Phrases</h6>
                <div class="form-group">
                    <div class="controls">
                        <div class="input-group">
                            <input type="text" id="input-training-phrase" class="form-control form-control-sm" placeholder="Add user expression">
                            <div class="input-group-append">
                                <button class="btn btn-success btn-sm" type="button" onclick="addTrainingPhrase()"><i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="div-training-phrase" class="form-group">
                </div>
            </div>
            <div class="tab-pane p-20 " id="tab3" role="tabpanel">
                <h6 class="card-title">Parameters</h6>
                <div class="form-group">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="font-weight: normal;">Name</th>
                                    <th style="font-weight: normal;">Entity</th>
                                    <th style="font-weight: normal;">Prompts</th>
                                    <th class="text-nowrap text-right" style="width: 50px;font-weight: normal;">Action</th>
                                </tr>
                            </thead>
                            <tbody id="tbody-parameter">
                                <tr>
                                    <td class="text-center" colspan="5">Empty parameter</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="form-group text-right">
                    <button class="btn btn-success btn-sm" type="button" onclick="addParameterModal()"><i class="fa fa-plus"></i> Add Parameter</button>
                </div>
            </div>
            <div class="tab-pane p-20 " id="tab4" role="tabpanel">
                <h6 class="card-title">Responses</h6>
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <h4 class="card-title">Text response</h4>
                        <div class="form-group">
                            <div class="controls">
                                <div class="input-group">
                                    <input type="text" id="input-response-text" class="form-control form-control-sm" placeholder="Enter a text response">
                                    <div class="input-group-append">
                                        <button class="btn btn-success btn-sm" type="button" onclick="addResponseText()"><i class="fa fa-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="div-ipsRPT" class="form-group">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <h4 class="card-title">Image</h4>
                        <div class="card">
                            <img class="card-img-top img-responsive" id="response-image" src="" onerror="this.src='<?php echo base_url('assets/img/default.jpg'); ?>'">
                            <div class="m-t-5">
                                <input type="text" name="responseImage" value="" class="form-control form-control-sm" placeholder="Enter image URL" onblur="setResponseImage(this)">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <h4 class="card-title">Card</h4>
                        <div class="card">
                            <img class="card-img-top img-responsive" id="response-card-image" src="" onerror="this.src='<?php echo base_url('assets/img/default.jpg'); ?>'">
                            <div class="m-t-5">
                                <input type="text" name="responseCard[imageUri]" value="" class="form-control form-control-sm" placeholder="Enter image URL" onblur="setResponseCardImage(this)">
                            </div>
                            <div class="m-t-5">
                                <input type="text" name="responseCard[title]" value="" class="form-control form-control-sm" placeholder="Enter card title (required)">
                            </div>
                            <div class="m-t-5">
                                <input type="text" name="responseCard[text]" value="" class="form-control form-control-sm" placeholder="Enter button title">
                            </div>
                            <div class="m-t-5">
                                <input type="text" name="responseCard[postback]" value="" class="form-control form-control-sm" placeholder="Enter URL postback">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <h4 class="card-title">Quick Replies</h4>
                        <div class="form-group">
                            <div class="m-t-5">
                                <input type="text" name="responseQuickReplie[title]" value="" class="form-control form-control-sm" placeholder="Enter title">
                            </div>
                            <div class="m-t-5">
                                <input type="text" name="responseQuickReplie[quickReplies][]" value="" class="form-control form-control-sm" placeholder="Enter 20 characters">
                            </div>
                            <div class="m-t-5">
                                <input type="text" name="responseQuickReplie[quickReplies][]" value="" class="form-control form-control-sm" placeholder="Enter 20 characters">
                            </div>
                            <div class="m-t-5">
                                <input type="text" name="responseQuickReplie[quickReplies][]" value="" class="form-control form-control-sm" placeholder="Enter 20 characters">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<div id="parameter-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="parameter-form" method="post" action="#" autocomplete="off">
                <input type="hidden" id="input-parameter-key" value="">
                <div class="modal-header">
                    <h4 class="modal-title">Parameter</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label">Name <span class="text-danger">*</span></label>
                        <input type="text" id="input-parameter-name" class="form-control form-control-sm" pattern="[0-9a-zA-z]+" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Entity <span class="text-danger">*</span></label>
                        <select id="input-parameter-entity" class="form-control form-control-sm" required>
                            <option value="@sys.date-time">@sys.date-time</option>
                            <option value="@sys.date">@sys.date</option>
                            <option value="@sys.date-period">@sys.date-period</option>
                            <option value="@sys.time">@sys.time</option>
                            <option value="@sys.time-period">@sys.time-period</option>
                            <option value="@sys.number">@sys.number</option>
                            <option value="@sys.cardinal">@sys.cardinal</option>
                            <option value="@sys.ordinal">@sys.ordinal</option>
                            <option value="@sys.number-integer">@sys.number-integer</option>
                            <option value="@sys.unit-area">@sys.unit-area</option>
                            <option value="@sys.unit-currency">@sys.unit-currency</option>
                            <option value="@sys.unit-length">@sys.unit-length</option>
                            <option value="@sys.unit-speed">@sys.unit-speed</option>
                            <option value="@sys.unit-volume">@sys.unit-volume</option>
                            <option value="@sys.unit-weight">@sys.unit-weight</option>
                            <option value="@sys.unit-information">@sys.unit-information</option>
                            <option value="@sys.temperature">@sys.temperature</option>
                            <option value="@sys.currency-name">@sys.currency-name</option>
                            <option value="@sys.unit-area-name">@sys.unit-area-name</option>
                            <option value="@sys.unit-length-name">@sys.unit-length-name</option>
                            <option value="@sys.unit-speed-name">@sys.unit-speed-name</option>
                            <option value="@sys.unit-volume-name">@sys.unit-volume-name</option>
                            <option value="@sys.unit-weight-name">@sys.unit-weight-name</option>
                            <option value="@sys.unit-information-name">@sys.unit-information-name</option>
                            <option value="@sys.zip-code">@sys.zip-code</option>
                            <option value="@sys.geo-capital">@sys.geo-capital</option>
                            <option value="@sys.geo-country">@sys.geo-country</option>
                            <option value="@sys.geo-city">@sys.geo-city</option>
                            <option value="@sys.geo-state">@sys.geo-state</option>
                            <option value="@sys.given-name">@sys.given-name</option>
                            <option value="@sys.last-name">@sys.last-name</option>
                            <option value="@sys.music-artist">@sys.music-artist</option>
                            <option value="@sys.music-genre">@sys.music-genre</option>
                            <option value="@sys.color">@sys.color</option>
                            <option value="@sys.language">@sys.language</option>
                            <option value="@sys.any">@sys.any</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Prompts <span class="text-danger">*</span></label>
                        <input type="text" id="input-parameter-prompt" class="form-control form-control-sm" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="btn-parameter-form" class="btn btn-outline-info" onclick="processParameter()"><i id="fa-parameter-form" class="fa fa-save"></i> บันทึก</button>
                    <button type="button" data-dismiss="modal" class="btn btn-outline-inverse"><i class="fa fa-close"></i> ยกเลิก</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>

    $('#add-form').parsley()

    $('#add-form').keypress(function (e) {
        if (e.which == '13') {
            e.preventDefault()
        }
    })

    var tempParameter = []
    var tempTrainingPhrase = []
    var tempResponseText = []

    $(document).ready(function () {
    })

    // parameter
    function addParameterModal() {
        $('#parameter-form').parsley().reset()
        $('#input-parameter-key').val(getID())
        $('#input-parameter-name').val('')
        $('#input-parameter-entity').val('@sys.any')
        $('#input-parameter-prompt').val('')
        $('#fa-parameter-form').removeClass('fa-spinner fa-spin').addClass('fa-save')
        $('#btn-parameter-form').prop('disabled', false)
        $('#parameter-modal').modal('show', {backdrop: 'true'})
    }

    function editParameterModal(key) {
        $('#input-parameter-key').val(tempParameter[key].name)
        $('#input-parameter-name').val(tempParameter[key].displayName)
        $('#input-parameter-entity').val(tempParameter[key].entityTypeDisplayName)
        $('#input-parameter-prompt').val(tempParameter[key].prompts)
        $('#parameter-form').parsley().reset()
        $('#fa-parameter-form').removeClass('fa-spinner fa-spin').addClass('fa-save')
        $('#btn-parameter-form').prop('disabled', false)
        $('#parameter-modal').modal('show', {backdrop: 'true'})
    }

    function deleteParameter(key) {
        delete tempParameter[key]
        renderParameter()
    }

    function processParameter() {
        if ($('#parameter-form').parsley().validate()) {
            $('#fa-parameter-form').removeClass('fa-save').addClass('fa-spinner fa-spin')
            $('#btn-parameter-form').prop('disabled', true)
            let name = $('#input-parameter-key').val()
            let displayName = $('#input-parameter-name').val()
            let entityTypeDisplayName = $('#input-parameter-entity').val()
            let prompts = $('#input-parameter-prompt').val().split(',')
            tempParameter[name] = {
                name: name,
                displayName: displayName,
                entityTypeDisplayName: entityTypeDisplayName,
                prompts: prompts
            }
            setTimeout(function () {
                renderParameter()
                $('#parameter-modal').modal('hide')
            }, 500)
        }
    }

    function renderParameter() {
        $('#tbody-parameter').html('')
        if (Object.keys(tempParameter).length > 0) {
            for (let key in tempParameter) {
                $('#tbody-parameter').append('<tr><td>' + tempParameter[key].displayName + '</td><td>' + tempParameter[key].entityTypeDisplayName + '</td><td>' + tempParameter[key].prompts + '</td><td class="text-nowrap"><a href="javascript:void(0)" class="btn btn-xs btn-outline-info m-r-1" onclick="editParameterModal(\'' + tempParameter[key].name + '\')"><i class="fa fa-edit"></i></a>&nbsp;<a href="javascript:void(0)" class="btn btn-xs btn-outline-danger" onclick="deleteParameter(\'' + tempParameter[key].name + '\')"><i class="fa fa-close"></i></a></td><input type="hidden" name="parameterKey[' + tempParameter[key].name + ']" value="' + tempParameter[key].name + '"><input type="hidden" name="parameterName[' + tempParameter[key].name + ']" value="' + tempParameter[key].displayName + '"><input type="hidden" name="parameterEntity[' + tempParameter[key].name + ']" value="' + tempParameter[key].entityTypeDisplayName + '"><input type="hidden" name="parameterPrompt[' + tempParameter[key].name + ']" value="' + tempParameter[key].prompts + '"></tr>')
            }
        } else {
            $('#tbody-parameter').html('<tr><td class="text-center" colspan="5">Empty parameter</td></tr>')
        }
    }

    // training phrases
    function addTrainingPhrase() {
        let text = $('#input-training-phrase').val()
        let key = checkTrainingPhrase(text)
        if (key == false) {
            $('#input-training-phrase').val('')
            tempTrainingPhrase[getID()] = text
            renderTrainingPhrase()
        }
    }

    function editTrainingPhrase(key) {
        let text = $('#' + key).val()
        tempTrainingPhrase[key] = text
        renderTrainingPhrase()
    }

    function deleteTrainingPhrase(key) {
        delete tempTrainingPhrase[key]
        renderTrainingPhrase()
    }

    function checkTrainingPhrase(text) {
        for (let key in tempTrainingPhrase) {
            if (tempTrainingPhrase[key] == text) {
                return key
            }
        }
        return false
    }

    function renderTrainingPhrase() {
        $('#div-training-phrase').html('')
        for (let key in tempTrainingPhrase) {
            $('#div-training-phrase').append('<div class="input-group m-b-5"><input type="text" id="' + key + '" name="trainingPhrase[' + key + ']" class="form-control form-control-sm" value="' + tempTrainingPhrase[key] + '" onblur="editTrainingPhrase(\'' + key + '\')"><div class="input-group-append"><button class="btn btn-danger btn-sm" type="button" onclick="deleteTrainingPhrase(\'' + key + '\')"><i class="fa fa-trash"></i></button></div></div>')
        }
    }

    // responses
    function addResponseText() {
        let text = $('#input-response-text').val()
        let key = checkResponseText(text)
        if (key == false) {
            $('#input-response-text').val('')
            tempResponseText[getID()] = text
            renderResponseText()
        }
    }

    function editResponseText(key) {
        let text = $('#' + key).val()
        tempResponseText[key] = text
        renderResponseText()
    }

    function deleteResponseText(key) {
        delete tempResponseText[key]
        renderResponseText()
    }

    function checkResponseText(text) {
        for (let key in tempResponseText) {
            if (tempResponseText[key] == text) {
                return key
            }
        }
        return false
    }

    function renderResponseText() {
        $('#div-ipsRPT').html('')
        for (let key in tempResponseText) {
            $('#div-ipsRPT').append('<div class="input-group m-b-5"><input type="text" id="' + key + '" name="responseText[]" class="form-control form-control-sm" value="' + tempResponseText[key] + '" onblur="editResponseText(\'' + key + '\')"><div class="input-group-append"><button class="btn btn-danger btn-sm" type="button" onclick="deleteResponseText(\'' + key + '\')"><i class="fa fa-trash"></i></button></div></div>')
        }
    }

    function setResponseImage(self) {
        $('#response-image').attr('src', self.value);
    }

    function setResponseCardImage(self) {
        $('#response-card-image').attr('src', self.value);
    }

    // global
    function getID() {
        return Math.random().toString(36).substr(2, 9)
    }

    $('#add-form').on('keyup keypress', function (e) {
        var keyCode = e.keyCode || e.which
        if (keyCode === 13) {
            e.preventDefault()
            return false
        }
    })

    $('#btn-add-form').click(function () {
        if ($('#add-form').parsley().validate() === true) {
            $('#fa-add-form').removeClass('fa-save').addClass('fa-spinner fa-spin')
            $('#btn-add-form').prop('disabled', true)
            $.ajax({
                url: service_base_url + 'intents/addintentprocess',
                type: 'POST',
                data: $('#add-form').serialize(),
                dataType: 'JSON',
                success: function (response) {
                    setTimeout(function () {
                        $('#fa-add-form').removeClass('fa-spinner fa-spin').addClass('fa-save')
                        $('#btn-add-form').prop('disabled', false)
                        getIntent()
                        editIntent($('#agent_id').val(), response.intent_id)
                        notification(response.status, response.title, response.message)
                    }, 200)
                }
            })
        }
    })

</script>