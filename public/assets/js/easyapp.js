const EasyApp = {
    cloneElement: function (elm, target) {
        const targetElement = $(elm).closest(target)
        targetElement.find('select.select2').each(function(){
            if ($(this).hasClass("select2-hidden-accessible")) {
                $(this).select2('destroy')
            }
        })
        const newElement = targetElement.clone()
        newElement.find('input, textarea, select').val('')                
        newElement.insertAfter(targetElement)
        this.initSelect(newElement)
        this.initSelect(targetElement)
    },

    removeElement: function (elm, target) {
        if (target) {
            $(elm).closest(target).remove()
        } else {
            $(elm).remove()
        }
    },

    initSelect: function (_target) {
        const _ini = this
        _target.find('.select2').each(function () {
            if ($(this).hasClass("select2-hidden-accessible")) {
                $(this).select2('destroy')
            }                        
            const _optionSelect = $(this).data('optionselect') || {}
            const _firstOption = $(this).find('option').eq(0)
            let _placeholder = $(this).data('placeholder') || 'Choose option'

            const _defaultOption = {
                theme: 'bootstrap-5',
                // width: '100%',
                allowClear: true,
                placeholder: _placeholder
            }
            const _option = {
                ..._defaultOption,
                ..._optionSelect
            }
            const _isAjax = $(this).data('ajax') || false
            if (_isAjax) {
                const _ini = $(this)
                const _url = _ini.data('url')
                const _repository = _ini.data('repository')
                const _filter = _ini.data('filter')
                if (_url === undefined) {
                    console.log('url select2 ' + $(this).attr('name') + ' belum diset')
                } else {
                    _option.ajax = {
                        url: _url,
                        type: 'get',
                        dataType: 'json',
                        delay: 500,
                        data: function (params) {
                            return {
                                q: $.trim(params.term), // search term
                                page: params.page,
                                repository: _repository,
                                filter: _filter
                            }
                        },
                        processResults: function (data) {
                            data.page = data.from || 1
                            return {
                                results: data.data,
                                pagination: {
                                    more: !!data.next_page_url
                                }
                            }
                        },
                        cache: true
                    }
                }
            }
            const _hasIcon = $(this).data('hasicon') || false
            const _asTable = $(this).data('astable') || false
            const _asCard = $(this).data('ascard') || false
            const _selectAsCard = $(this).data('selectascard') || false
            if (_hasIcon) {
                _option.templateSelection = _ini.formatText
                _option.templateResult = _ini.formatText
            }

            if (_asTable) {
                _firstOption.prop('disabled', 1)
                _option.templateSelection = _ini.formatTable
                _option.templateResult = _ini.formatTable
            }

            if (_asCard) {
                if (_selectAsCard) {
                    _option.templateSelection = _ini.formatCard
                }
                _option.templateResult = _ini.formatCard
            }

            $(this).select2(_option)
        })
    }
}