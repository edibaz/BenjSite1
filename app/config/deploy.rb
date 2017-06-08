set :application,   "Benj_Kinenga"
set :domain,        "ssh.cluster023.hosting.ovh.net"
set :deploy_to,     "/homez.92/benjkinexw/www"
set :app_path,      "app"
set :user,          "benjkinexw"

ssh_options[:port]  = "22"
set :use_sudo,      false

set :repository,    "git@github.com:edibaz/BenjSite1.git"
set :deploy_via,    :copy
set :scm,           :git
# Or: `accurev`, `bzr`, `cvs`, `darcs`, `subversion`, `mercurial`, `perforce`, or `none`

set :model_manager, "doctrine"
# Or: `propel`

role :web,          domain                         # Your HTTP server, Apache/etc
role :app,          domain, :primary => true       # This may be the same as your `Web` server

set :shared_files,      ["app/config/parameters.yml"]
set :shared_children,   [app_path + "/logs"]

set :use_composer,  true
set :update_vendors,true

set  :keep_releases,3

task :upload_parameters do
  origin_file = "app/config/parameters.yml"
  destination_file = shared_path + "/app/config/parameters.yml" # Notice the
  shared_path

  try_sudo "mkdir -p #{File.dirname(destination_file)}"
  top.upload(origin_file, destination_file)
end

after "deploy:setup", "upload_parameters"

# Be more verbose by uncommenting the following line
# logger.level = Logger::MAX_LEVEL