VAGRANTFILE_API_VERSION = "2"

ENV['STATION_PATH'] = '/.deploy/station'

@path = File.dirname(__FILE__) + ENV['STATION_PATH']
require @path + '/bootstrap.rb'

# Merge config files
default = YAML::load(File.read(@path+'/Station/config.yaml'))
default = default.deep_merge(YAML::load(File.read(File.dirname(__FILE__)+'/config-default.yaml')))
@station_config = File.exist?(File.dirname(__FILE__)+'/config.yaml') ?
  default.deep_merge(YAML::load(File.read(File.dirname(__FILE__)+'/config.yaml'))) :
  default

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|

  config.vm.network "forwarded_port", guest: 1080, host: 1080

  $station = Station.new()

  $station.configure(config, @station_config, @path)
  $station.provision
end