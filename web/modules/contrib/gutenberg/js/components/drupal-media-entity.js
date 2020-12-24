/**
* DO NOT EDIT THIS FILE.
* See the following change record for more information,
* https://www.drupal.org/node/2815083
* @preserve
**/'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

(function (wp, $, Drupal, DrupalGutenberg, drupalSettings) {
  var element = wp.element,
      blockEditor = wp.blockEditor,
      components = wp.components,
      data = wp.data;
  var Placeholder = components.Placeholder,
      Button = components.Button,
      FormFileUpload = components.FormFileUpload,
      SelectControl = components.SelectControl,
      IconButton = components.IconButton,
      PanelBody = components.PanelBody,
      Toolbar = components.Toolbar,
      BaseControl = components.BaseControl;
  var BlockIcon = blockEditor.BlockIcon,
      MediaUpload = blockEditor.MediaUpload,
      BlockControls = blockEditor.BlockControls,
      InspectorControls = blockEditor.InspectorControls,
      URLInput = blockEditor.URLInput;
  var Component = element.Component,
      Fragment = element.Fragment;
  var DrupalIcon = DrupalGutenberg.Components.DrupalIcon;

  var __ = Drupal.t;
  var withSelect = data.withSelect;

  var DrupalMediaEntity = function (_Component) {
    _inherits(DrupalMediaEntity, _Component);

    function DrupalMediaEntity() {
      _classCallCheck(this, DrupalMediaEntity);

      var _this = _possibleConstructorReturn(this, (DrupalMediaEntity.__proto__ || Object.getPrototypeOf(DrupalMediaEntity)).apply(this, arguments));

      _this.state = {
        value: '',
        loading: false
      };
      _this.insertMedia = _this.insertMedia.bind(_this);
      _this.openMediaEdit = _this.openMediaEdit.bind(_this);
      _this.onUpload = _this.onUpload.bind(_this);
      _this.changeViewMode = _this.changeViewMode.bind(_this);
      return _this;
    }

    _createClass(DrupalMediaEntity, [{
      key: 'onUpload',
      value: function onUpload(event) {
        var _this2 = this;

        var _props = this.props,
            attributes = _props.attributes,
            mediaUpload = _props.mediaUpload,
            onError = _props.onError;
        var allowedTypes = attributes.allowedTypes;


        mediaUpload({
          allowedTypes: allowedTypes,
          filesList: event.target.files,
          onError: onError,
          onFileChange: function onFileChange(fileData) {
            if (fileData && fileData[0] && fileData[0].media_entity && fileData[0].media_entity.id) {
              _this2.insertMedia(fileData[0].media_entity.id);
            }
          }
        });
      }
    }, {
      key: 'changeViewMode',
      value: function changeViewMode(viewMode) {
        var setAttributes = this.props.setAttributes;

        setAttributes({
          viewMode: viewMode
        });
      }
    }, {
      key: 'insertMedia',
      value: function insertMedia(mediaEntityId) {
        var setAttributes = this.props.setAttributes;


        if (isNaN(mediaEntityId)) {
          var regex = /\((\d*)\)$/;
          var match = regex.exec(mediaEntityId);
          mediaEntityId = match[1];
        }

        setAttributes({
          mediaEntityIds: [mediaEntityId]
        });

        this.setState({ value: '' });
      }
    }, {
      key: 'openMediaEdit',
      value: function openMediaEdit(mediaEntityIds, clientId) {
        var _this3 = this;

        this.setState({ loading: true });

        var elementSettings = {
          progress: { type: 'throbber' },
          dialogType: 'modal',
          dialog: { width: 800 },
          dialogRenderer: null,
          url: '/media/' + mediaEntityIds[0] + '/edit?gutenberg',
          base: clientId
        };

        Drupal.ajax(elementSettings).execute().done(function () {
          _this3.setState({ loading: false });
        });
      }
    }, {
      key: 'render',
      value: function render() {
        var _this4 = this;

        var _props2 = this.props,
            className = _props2.className,
            isMediaLibraryEnabled = _props2.isMediaLibraryEnabled,
            mediaContent = _props2.mediaContent,
            mediaViewModes = _props2.mediaViewModes,
            attributes = _props2.attributes,
            setAttributes = _props2.setAttributes,
            isSelected = _props2.isSelected,
            clientId = _props2.clientId;
        var _state = this.state,
            value = _state.value,
            loading = _state.loading;
        var mediaEntityIds = attributes.mediaEntityIds;
        var viewModes = mediaContent.view_modes;


        var instructions = __('Upload a media file or pick one from your media library.');
        var placeholderClassName = ['block-editor-media-placeholder', 'editor-media-placeholder', className].join(' ');

        if (Array.isArray(mediaViewModes) && mediaViewModes.length) {
          var inspectorControls = React.createElement(
            InspectorControls,
            null,
            !attributes.lockViewMode && React.createElement(
              PanelBody,
              { title: __('Media entity settings') },
              React.createElement(SelectControl, {
                label: __('View mode'),
                value: attributes.viewMode,
                options: mediaViewModes,
                onChange: this.changeViewMode
              })
            )
          );

          var html = viewModes.default.processedHtml;
          if (viewModes[attributes.viewMode]) {
            html = viewModes[attributes.viewMode].processedHtml;
          }

          return React.createElement(
            Fragment,
            null,
            React.createElement('div', { dangerouslySetInnerHTML: { __html: html } }),
            inspectorControls,
            React.createElement(
              BlockControls,
              null,
              React.createElement(
                Toolbar,
                {
                  controls: [{
                    icon: 'edit',
                    title: __('Edit media'),
                    onClick: function onClick() {
                      return _this4.openMediaEdit(mediaEntityIds, clientId);
                    }
                  }, {
                    icon: 'no',
                    title: __('Clear media'),
                    onClick: function onClick() {
                      return setAttributes({ mediaEntityIds: [] });
                    }
                  }]
                },
                loading && React.createElement(
                  'div',
                  { className: 'ajax-progress ajax-progress-throbber' },
                  React.createElement(
                    'div',
                    { className: 'throbber' },
                    '\xA0'
                  )
                )
              )
            )
          );
        }

        var fetchMedia = function fetchMedia(search) {
          return new Promise(function (resolve) {
            fetch(drupalSettings.path.baseUrl + 'editor/media/autocomplete?search=' + search).then(function (response) {
              return response.json();
            }).then(function (json) {
              resolve(json);
            });
          });
        };

        var processMediaResult = function processMediaResult(url, post) {
          _this4.setState({ value: url });
        };

        var linkId = 'search_media_0001';

        var content = isMediaLibraryEnabled ? React.createElement(MediaUpload, {
          onSelect: this.insertMedia,
          allowedTypes: attributes.allowedTypes,
          multiple: false,
          handlesMediaEntity: true
        }) : React.createElement(
          Fragment,
          null,
          React.createElement(URLInput, {
            className: 'media-entity-search-input',
            value: value,
            placeholder: __('Type media ID or text to search media'),

            autoFocus: false,

            onChange: processMediaResult,
            disableSuggestions: !isSelected,
            id: linkId,
            hasBorder: true,
            __experimentalFetchLinkSuggestions: fetchMedia
          }),
          React.createElement(
            Button,
            {
              isLarge: true,
              isPrimary: true,
              title: __('Insert'),
              onClick: function onClick() {
                return _this4.insertMedia(value);
              }
            },
            __('Insert')
          )
        );

        return React.createElement(
          Placeholder,
          {
            icon: React.createElement(BlockIcon, { icon: 'admin-media' }),
            label: __('Media'),
            instructions: instructions,
            className: placeholderClassName
          },
          React.createElement(FormFileUpload, {
            onChange: this.onUpload,
            accept: 'image/*,video/*,audio/*,application/*',
            multiple: false,
            render: function render(_ref) {
              var openFileDialog = _ref.openFileDialog;

              return React.createElement(
                Fragment,
                null,
                React.createElement(
                  IconButton,
                  {
                    isLarge: true,
                    onClick: openFileDialog,
                    className: ['block-editor-media-placeholder__button', 'editor-media-placeholder__button', 'block-editor-media-placeholder__upload-button'].join(' '),
                    icon: 'upload'
                  },
                  __('Upload')
                )
              );
            }
          }),
          content
        );
      }
    }]);

    return DrupalMediaEntity;
  }(Component);

  var createClass = withSelect(function (select, props) {
    var _select = select('core/block-editor'),
        getSettings = _select.getSettings;

    var _select2 = select('drupal'),
        getMediaEntity = _select2.getMediaEntity;

    var attributes = props.attributes;

    var mediaEntityIds = attributes.mediaEntityIds || [];

    var defaultData = {
      mediaContent: {},
      mediaViewModes: [],
      mediaUpload: getSettings().mediaUpload
    };

    if (!mediaEntityIds.length) {
      return defaultData;
    }

    var mediaEntity = getMediaEntity(mediaEntityIds[0]);

    if (!mediaEntity) {
      return defaultData;
    }

    var viewModes = mediaEntity.view_modes;

    var mediaViewModes = [];

    if (Object.keys(viewModes).length) {
      for (var viewMode in viewModes) {
        if (!viewModes.hasOwnProperty(viewMode)) {
          continue;
        }

        mediaViewModes.push({
          value: viewModes[viewMode]['view_mode'],
          label: viewModes[viewMode]['view_mode_name']
        });

        var node = document.createElement('div');
        node.innerHTML = viewModes[viewMode].html;
        var formElements = node.querySelectorAll('input, select, button, textarea, a');
        formElements.forEach(function (element) {
          element.setAttribute('readonly', true);
          element.setAttribute('required', false);

          if (element.tagName === 'A') {
            element.removeAttribute('href');
          }
        });
        viewModes[viewMode].processedHtml = node.innerHTML;
      }
    }

    return {
      mediaContent: mediaEntity,
      mediaViewModes: mediaViewModes,
      mediaUpload: getSettings().mediaUpload
    };
  })(DrupalMediaEntity);

  window.DrupalGutenberg = window.DrupalGutenberg || {};
  window.DrupalGutenberg.Components = window.DrupalGutenberg.Components || {};
  window.DrupalGutenberg.Components.DrupalMediaEntity = createClass;
})(wp, jQuery, Drupal, DrupalGutenberg, drupalSettings);