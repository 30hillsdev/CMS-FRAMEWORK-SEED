#
# This will split up each Cms_Framework_Seed library to its own github repo
#

./git-subsplit.sh init git@github.com:lavalite/framework.git
./git-subsplit.sh publish --no-tags src/Cms_Framework_Seed/Activities:git@github.com:Cms_Framework_Seed/Activities.git
./git-subsplit.sh publish --no-tags src/Cms_Framework_Seed/Database:git@github.com:Cms_Framework_Seed/database.git
./git-subsplit.sh publish --no-tags src/Cms_Framework_Seed/Filer:git@github.com:Cms_Framework_Seed/filer.git
./git-subsplit.sh publish --no-tags src/Cms_Framework_Seed/Form:git@github.com:Cms_Framework_Seed/form.git
./git-subsplit.sh publish --no-tags src/Cms_Framework_Seed/Hashids:git@github.com:Cms_Framework_Seed/hashids.git
./git-subsplit.sh publish --no-tags src/Cms_Framework_Seed/Menu:git@github.com:Cms_Framework_Seed/menu.git
./git-subsplit.sh publish --no-tags src/Cms_Framework_Seed/Node:git@github.com:Cms_Framework_Seed/node.git
./git-subsplit.sh publish --no-tags src/Cms_Framework_Seed/Repository:git@github.com:Cms_Framework_Seed/repository.git
./git-subsplit.sh publish --no-tags src/Cms_Framework_Seed/Roles:git@github.com:Cms_Framework_Seed/roles.git
./git-subsplit.sh publish --no-tags src/Cms_Framework_Seed/Settings:git@github.com:Cms_Framework_Seed/settings.git
./git-subsplit.sh publish --no-tags src/Cms_Framework_Seed/Team:git@github.com:Cms_Framework_Seed/team.git
./git-subsplit.sh publish --no-tags src/Cms_Framework_Seed/Theme:git@github.com:Cms_Framework_Seed/theme.git
./git-subsplit.sh publish --no-tags src/Cms_Framework_Seed/Trans:git@github.com:Cms_Framework_Seed/trans.git
./git-subsplit.sh publish --no-tags src/Cms_Framework_Seed/User:git@github.com:Cms_Framework_Seed/user.git
rm -rf .subsplit/