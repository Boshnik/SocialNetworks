SocialNetworks.window.CreateItem = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'socialnetworks-item-window-create';
    }
    Ext.applyIf(config, {
        title: _('socialnetworks_item_create'),
        width: 550,
        autoHeight: true,
        url: SocialNetworks.config.connector_url,
        action: 'mgr/item/create',
        fields: this.getFields(config),
        keys: [{
            key: Ext.EventObject.ENTER, shift: true, fn: function () {
                this.submit()
            }, scope: this
        }]
    });
    SocialNetworks.window.CreateItem.superclass.constructor.call(this, config);
};
Ext.extend(SocialNetworks.window.CreateItem, MODx.Window, {

    getFields: function (config) {
        return [{
            xtype: 'modx-combo',
            fieldLabel: _('socialnetworks_item_name'),
            name: 'name',
            id: config.id + '-name',
            anchor: '99%',
            allowBlank: false,
            emptyText : 'Выберите сервис',
            store: JSON.parse(MODx.config['socialnetworks_services']),
            fields: ['name','value'],
            valueField: 'name',
            displayField: 'value',
    		hiddenName : 'name',
        }, {
            xtype: 'textfield',
            fieldLabel: _('socialnetworks_item_link'),
            name: 'link',
            id: config.id + '-link',
            anchor: '99%',
        }, {
            xtype: 'xcheckbox',
            boxLabel: _('socialnetworks_item_active'),
            name: 'active',
            id: config.id + '-active',
            checked: true,
        }];
    },

    loadDropZones: function () {
    }

});
Ext.reg('socialnetworks-item-window-create', SocialNetworks.window.CreateItem);

SocialNetworks.window.UpdateItem = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'socialnetworks-item-window-update';
    }
    Ext.applyIf(config, {
        title: _('socialnetworks_item_update'),
        width: 550,
        autoHeight: true,
        url: SocialNetworks.config.connector_url,
        action: 'mgr/item/update',
        fields: this.getFields(config),
        keys: [{
            key: Ext.EventObject.ENTER, shift: true, fn: function () {
                this.submit();
            }, scope: this
        }]
    });
    SocialNetworks.window.UpdateItem.superclass.constructor.call(this, config);
};
Ext.extend(SocialNetworks.window.UpdateItem, MODx.Window, {

    getFields: function (config) {
        return [{
            xtype: 'hidden',
            name: 'id',
            id: config.id + '-id',
        }, {
            xtype: 'modx-combo',
            fieldLabel: _('socialnetworks_item_name'),
            name: 'name',
            id: config.id + '-name',
            anchor: '99%',
            allowBlank: true,
            store: JSON.parse(MODx.config['socialnetworks_services']),
            fields: ['name','value'],
            valueField: 'name',
            displayField: 'value',
    		hiddenName : 'name',
        }, {
            xtype: 'textfield',
            fieldLabel: _('socialnetworks_item_link'),
            name: 'link',
            id: config.id + '-link',
            anchor: '99%',
        }, {
            xtype: 'xcheckbox',
            boxLabel: _('socialnetworks_item_active'),
            name: 'active',
            id: config.id + '-active',
            checked: true,
        }];
    },

    loadDropZones: function () {
    }

});
Ext.reg('socialnetworks-item-window-update', SocialNetworks.window.UpdateItem);