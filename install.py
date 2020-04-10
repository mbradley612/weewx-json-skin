# installer for the 'json' skin
# Copyright 2020 Matthew Bradley

from weecfg.extension import ExtensionInstaller


def loader():
    return BasicInstaller()


class BasicInstaller(ExtensionInstaller):
    def __init__(self):
        super(BasicInstaller, self).__init__(
            version="0.2",
            name='json-skin',
            description='Skin that produces reports in JSON suitable for consumption using Google Charts.',
            author="Matthew Bradley",
            author_email="mbradley612@github.com",
            config={
                'StdReport': {
                    'json': {
                        'skin': 'json',
                        'HTML_ROOT': 'json'}}},
            files=[('skins/json',
                    ['skins/json/day-pressure.json.tmpl',
                     'skins/json/day-rain.json.tmpl',
                     'skins/json/day-temp.json.tmpl',
                     'skins/json/day-wind.json.tmpl',
                     'skins/json/day.json.tmpl',
                     'skins/json/index.html.tmpl',
                     'skins/json/skin.conf',
                     'skins/json/update-archive-weather.js']),
                   ]
        )