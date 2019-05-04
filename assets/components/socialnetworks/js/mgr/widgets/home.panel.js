SocialNetworks.panel.Home = function (config) {
    config = config || {};
    Ext.apply(config, {
        baseCls: 'modx-formpanel',
        layout: 'anchor',
        /*
         stateful: true,
         stateId: 'socialnetworks-panel-home',
         stateEvents: ['tabchange'],
         getState:function() {return {activeTab:this.items.indexOf(this.getActiveTab())};},
         */
        hideMode: 'offsets',
        items: [{
            html: '<h2>' + _('socialnetworks') + '</h2>',
            cls: '',
            style: {margin: '15px 0'}
        }, {
            xtype: 'modx-tabs',
            defaults: {border: false, autoHeight: true},
            border: true,
            hideMode: 'offsets',
            items: [{
                title: _('socialnetworks_items'),
                layout: 'anchor',
                items: [{
                    html: _('socialnetworks_intro_msg'),
                    cls: 'panel-desc',
                }, {
                    xtype: 'socialnetworks-grid-items',
                    cls: 'main-wrapper',
                }]
            }]
        }]
    });
    SocialNetworks.panel.Home.superclass.constructor.call(this, config);
};
Ext.extend(SocialNetworks.panel.Home, MODx.Panel);
Ext.reg('socialnetworks-panel-home', SocialNetworks.panel.Home);