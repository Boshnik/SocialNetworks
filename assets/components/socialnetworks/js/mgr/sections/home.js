SocialNetworks.page.Home = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        components: [{
            xtype: 'socialnetworks-panel-home',
            renderTo: 'socialnetworks-panel-home-div'
        }]
    });
    SocialNetworks.page.Home.superclass.constructor.call(this, config);
};
Ext.extend(SocialNetworks.page.Home, MODx.Component);
Ext.reg('socialnetworks-page-home', SocialNetworks.page.Home);